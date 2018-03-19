<?php

namespace Modules\Ticket\Controllers;

use App\Models\DiscountCode;
use App\Models\Show;
use Modules\Ticket\Transformers\DiscountCodeTransformer;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DiscountCodeController extends Controller
{

    public function getDisocuntCodes(Request $request, DiscountCodeTransformer $transformer)
    {
        $this->validate($request, [
            'theater_id' => 'required'
        ]);

        $theater_id = $request->input('theater_id');
        $per_page = $request->input('per_page', 10);
        $discountCodes = DiscountCode::where('theater_id', $theater_id)->paginate($per_page);

        return $this->response->paginator($discountCodes, $transformer);
    }

    public function createDiscountCode(Request $request, DiscountCodeTransformer $transformer)
    {
        $this->validate($request, [
            'theater_id' => 'required',
            'name' => 'required'
        ]);

        $theater_id = $request->input('theater_id');
        $name = $request->input('name');
        $start = $request->input('start');
        $end = $request->input('end');
        $type = $request->input('type');
        $percent = $request->input('percent');
        $price = $request->input('price');
        $ticketTypes = $request->input('ticet_types');
        $limit = $request->input('limit');
        $code = str_random('8');
        $qr_code = base64_encode(QrCode::format('png')->size(250)->generate($code));


        $discountCode = DiscountCode::create([
            'name' => $name,
            'start' => $start,
            'end' => $end,
            'type' => $type,
            'percent' => $percent,
            'price' => $price,
            'qr_code' => $qr_code,
            'code' => $code,
            'theater_id' => $theater_id,
            'limit' => $limit,
            'used' => 0
        ]);

        foreach ($ticketTypes as $ticketTypeId) {
            $discountCode->ticketTypes()->attach($ticketTypeId);
        }
        return $this->item($discountCode, $transformer);

    }

    public function removeDiscountCode(Request $request, DiscountCodeTransformer $transformer, $id)
    {
        $discountCode = DiscountCode::find($id);
        $discountCode->delete();
        $discountCode->ticketTypes()->detach();
        return json_encode(['status' => 'success', 'message' => 'deleted']);

    }

    public function checkDiscountCodeForApi(Request $request)
    {
        $this->validate($request, [
            'show_id' => 'required',
            'code' => 'required'
        ]);
        $code = $request->input('code');
        $show_id = $request->input('show_id');
        $discount = DiscountCode::where('code', $code)->first();
        if ($this->checkDiscountCode($code, $show_id) == 'code_is_valid') {
            return response()->json(['status' => 'success', 'message' => $this->checkDiscountCode($code, $show_id), 'code' => $discount], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => $this->checkDiscountCode($code, $show_id)], 401);
        }

    }

    public function checkDiscountCode($code, $show_id)
    {
        $discount = DiscountCode::where('code', $code)->first();
        $discount_id = $discount['_id'];
        $show = Show::find($show_id);

        $discount_card_isset_in_show = false;


        if (!$show) {
            return 'show_not_found';
        } else if (!$discount) {
            return 'code_is_not_valid';
        } else {
    //  the StartDate to validate when you buy the ticket is also good
            if( strtotime($discount->start) < strtotime(date("Y-m-d H:i:s"))  && strtotime(date("Y-m-d H:i:s")) < strtotime($discount->end)  ) {
                if ($discount->used >= $discount->limit) {
                    return 'code_limit_isset';
                }
                $discount_cards_for_show = $show->discountCodes;
                $ticket_types_for_show = $show->ticket_type_ids;
                $ticket_types_for_discount_card = $discount->ticketTypes;
                foreach ($discount_cards_for_show as $discountCard) {
                    if ($discountCard['_id'] == $discount_id) {
                        $discount_card_isset_in_show = true;
                    }
                }
                if (!$discount_card_isset_in_show) {
                    return 'code_is_not_valid_for_this_show';
                }
                $validation = false;
                foreach ($ticket_types_for_show as $ticketTypeForShow) {
                    foreach ($ticket_types_for_discount_card as $ticketTypeForCard) {
                        if ($ticketTypeForShow['id'] == $ticketTypeForCard['_id']) {
                            foreach ($ticketTypeForCard['discount_code_ids'] as $val) {
                                if ($val == $discount_id) {
                                    $validation = true;
                                }
                            }
                        }
                    }
                }
                if (!$validation) {
                    return 'code_is_not_valid_for_ticket_types';
                }
                return 'code_is_valid';
            }else{
                return 'code_time_isset';
            }


        }
    }
    public function calculateDiscountCode($code,$tickets){
        $total = 0;
        $discountCard = DiscountCode::where('code',$code)->first();
        foreach($tickets as $ticket){
            foreach($discountCard->ticketTypes as $discountTicketType){
                if($discountTicketType['_id'] == $ticket->ticket_type_id){
                    if($discountCard->type == 'fixed'){
                        $total = $total +$discountCard->price;
                    }else{
                        $total = $total+ (($ticket->price*$discountCard->percent)/100);
                    }
                }

            }
        }
        return $total;

    }
}