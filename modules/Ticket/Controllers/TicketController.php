<?php

namespace Modules\Ticket\Controllers;

use App\Models\Agency;
use App\Models\DiscountCode;
use App\Models\Theater;
use App\Models\Seat;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Order;
use App\Models\Donation;


use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Modules\Admin\Transformers\UserTransformer;
use Tymon\JWTAuth\JWTAuth;
use JWTAuthException;
use App\Jobs\SendEmailWithTickets;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\PaymentController;
use Modules\Ticket\Controllers\DiscountCodeController;

use Modules\Ticket\Transformers\OrderTransformer;
use Modules\Ticket\Transformers\TicketTransformer;

class TicketController extends Controller
{
    private $user;
    private $jwtauth;
    private $payment;

    public function __construct(User $user, JWTAuth $jwtauth)
    {

        $this->jwtauth = $jwtauth;
        if(request()->path() != "api/ticket/reservations")
            $this->user = $this->jwtauth->parseToken()->authenticate();
        $this->paymentController = new PaymentController();

    }

    public function newReservation(Request $request, TicketTransformer $transformer)
    {
        $this->validate($request, [
            'theater_id' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'user_id'=>'required',
            'show_id'=>'required'
        ]);


        $theater_id = $request->input('theater_id');
        $date = $request->input('date');
        $start_time = $request->input('start_time');
        $tickets = $request->input('tickets');
        $total_price = $request->input('total_price');
        $total_tax = $request->input('total_tax');
        $user_id = $request->input('user_id');
        $channel = $request->input('channel','Online');
        $show_id = $request->input('show_id');


        // $seat_id = $request->input('seat_id');
        // $ticket_type_id = $request->input('ticket_type_id');


        //check if theater exists
        $theater = Theater::find($theater_id);
        if (!$theater) {
            abort(401, 'theater_not_found');
        }
        //check if event exist
        $event = Event::where(['date' => $date, 'start_time' => $start_time, 'theater_id' => $theater_id,'show_id'=>$show_id])->first();
        if (!$event) {
            abort(401, 'event_not_found');
        }


            $order = Order::create([
                'event_id' => $event['_id'],
                'theater_id' => $theater_id,
                'agency_id' => $theater['agency_id'],
                'total_price' => $total_price,
                'total_tax' => $total_tax,
                'user_id'=> $user_id,
                'channel'=> $channel,
                'status' => 'waiting'
            ]);
            $created_tickets = [];
            foreach ($tickets as $ticket) {
                $referance_code = md5(microtime());
                $qr_code = base64_encode(QrCode::format('png')->size(250)->generate($referance_code));

                $created_ticket = Ticket::create([
                    'theater_id' => $theater_id,
                    'event_id' => $event['_id'],
                    'order_id' => $order['_id'],
                    'ticket_type_id' => $ticket['ticket_type_id'],
                    'seat_id' => $ticket['seat_id'],
                    'date'=>$date,
                    'start_time'=>$start_time,
                    'type' => $ticket['type'],
                    'price' => $ticket['price'],
                    'reference_code' => $referance_code,
                    'qr_code' => $qr_code,
                    'status' => 'reserved',
                ]);
            $created_tickets[] = $created_ticket;
            }
        // }
    //    return $created_tickets;

        $tickets = Ticket::where(['order_id'=>$order['_id']])->paginate(20);
            //ToDo:: remove after testing;
       // $this->sendEmailWithTIcket($order['_id']);
        return $this->response->paginator($tickets, $transformer);

    }


    public function getTickets(Request $request, TicketTransformer $transformer)
    {
        $this->validate($request, [
            'event_id' => 'required',
            'user_id'=>'required'
        ]);
        $event_id = $request->input('event_id');
        $theater_id=$request->input('theater_id');
        $order_id =$request->input('order_id');
        $per_page= $request->input('per_page',1);

        $tickets = Ticket::where(['event_id' => $event_id, 'theater_id' => $theater_id,'order_id'=>$order_id])->paginate($per_page);

        return $this->response->paginator($tickets, $transformer);
    }

    public function getReservations(Request $request)
    {

        $this->validate($request, [
            'show_id' => 'required',
            'date' => 'required',
            'start_time' => 'required'
        ]);

        $show_id = $request->input('show_id');
        $date = $request->input('date');
        $start_time = $request->input('start_time');
        $event = Event::where(['date' => $date, 'start_time' => $start_time, 'show_id' => $show_id])->first();
       
       $waitingOrders = Order::where(['event_id' => $event['_id'],'status'=>'waiting'])->get();
       foreach($waitingOrders as $order)
       {
           if($order->releaseSeats())
           {
            Ticket::where('order_id', $order['id'])->delete();
           }
           $order->status="released";
           $order->save();
       }
        $tickets = Ticket::where(['event_id' => $event['_id']])->get();

        return $tickets;
    }

    public function cancelReservation(Request $request,OrderTransformer $transformer)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'order_id' => 'required'
        ]);
        $user_id = $request->Input('user_id');
        $order_id = $request->Input('order_id');
        $order = Order::where(['_id' => $order_id,'status'=>'waiting'])->first();
  
            if($order)
            {
             Ticket::where('order_id', $order['id'])->delete();
            }
            $order->status="released";
            $order->save();
     
            $orders = Order::where('user_id',$user_id)->orderBy('created_at','DESC')->paginate(20);

            return $this->response->paginator($orders, $transformer);
    }

    public function getEventTickets(Request $request, TicketTransformer $transformer)
    {
        $this->validate($request, [
            'event_id' => 'required_without:show_id',
            'show_id' => 'required_without:event_id',
            'theater_id' => 'required'
        ]);
        $event_id = $request->input('event_id');
        $theater_id = $request->input('theater_id');
        $show_id = $request->input('show_id');
        $per_page = $request->input('per_page', 20);
        $status = $request->input('status', '');

        $tickets = Ticket::with(['event','user','seat'])
            ->where('status','!=','reserved')
            ->status($status)
            ->event($event_id)
            ->show($show_id)
            ->where(['theater_id' => $theater_id])
            ->paginate((int)$per_page);

        return $this->response->paginator($tickets, $transformer);
    }
    public function getTicketByCode(Request $request,TicketTransformer $transformer){
        $this->validate($request, [
            'reference_code' => 'required',
        ]);
        $reference_code = $request->input('reference_code');
        $ticket = Ticket::with(['user','event','seat'])->where('reference_code',$reference_code)->first();
        if($ticket){
            $ticket['theater'] = Theater::find($ticket["theater_id"]);
        }
        $ticket['event']=$ticket->event;
        $ticket['seat']=$ticket->seat;
        $ticket['area']=$ticket->seat->area;
        return $ticket;

    }

    public function scanTicket(Request $request)
    {
        $this->validate($request, [
            'theater_id' => 'required',
            'scan_code' => 'required',
            'user_id' => 'required'
        ]);
        $theater_id = $request->input('theater_id');
        $user_id = $request->input('user_id');


        $user = User::find($user_id);
        $theater = Theater::find($theater_id);

        if($user->theater_id != $theater_id){
            abort(404, 'User not authorized to scan tickets for this theater');
        }

        $scaner_user = $this->user;
//        if (!$theater) {
//            abort(401, 'theater_not_found');
//        }

        $scan_code = $request->input('scan_code');

        $ticket = Ticket::where('reference_code', $scan_code)->first();
        if (!$ticket) {
            abort(401, 'ticket_not_found');
        }
        if ($ticket['status'] == 'scanned') {
            abort(401, 'ticket_already_scanned');
        }
        $ticket->status = 'scanned';
        $ticket->scan_user_id = $scaner_user['_id'];
        $ticket->save();
        $ticket['event']=$ticket->event;
        $ticket['seat']=$ticket->seat;
        $ticket['area']=$ticket->seat->area;
        

        return response()
            ->json(['staus' => 'Success', 'ticket' => $ticket, 'message' => 'ticket_scanned_successful']);
    }


    public function payForTickets(Request $request, OrderTransformer $transformer)
    {
        $this->validate($request, [
            'order_id' => 'required',
            'user_id' => 'required',
            'payment_prof_id' => 'required_without:card.number',
            'card.number' => 'required_without:payment_prof_id',
            'card.expiryMonth' => 'required_without:payment_prof_id',
            'card.expiryYear' => 'required_without:payment_prof_id',
            'card.cvv' => 'required_without:payment_prof_id',
        ]);


        $user_id = $request->input('user_id');
        $order_id = $request->input('order_id');
        $payment_prof_id = $request->input('payment_prof_id');
        $card['number'] = $request->input('number');
        $card['expiryMonth'] = $request->input('expiryMonth');
        $card['expiryYear'] = $request->input('expiryYear');
        $card['cvv'] = $request->input('cvv');
        $test_mode = $request->input('test_mode',false);
        $donation_price = $request->input('donation_price','');
        $discount_code = $request->input('discount_code',null);
        $discountPrice = 0;
        //check if user exists
        $user = User::find($user_id);
        if (!$user) {
            abort(401, 'user_not_found');
        }

        $order = Order::find($order_id);
        if (!$order) {
            abort(401, 'order_not_found');
        }

        $event = Event::where('_id',$order->event_id)->first();
        $show = $event->show;


        $total_price = $order['total_price'];
        // including donation in order
        if($donation_price){
          $donation = Donation::create([
            'user_id'=>$user_id,
            'theater_id'=>$order['theater_id'],
            'price'=>$donation_price,
            'order_id'=>$order['_id'],
          ]);

            $total_price = (int)$total_price+(int)$donation_price;
        }
        //check discount Code
        if($discount_code){
            $discountController = new DiscountCodeController();
            $checkDisocuntCode = $discountController->checkDiscountCode($discount_code,$show['_id']);
            if($checkDisocuntCode != 'code_is_valid'){
                abort(401,$checkDisocuntCode);
            }
            $disocunt = DiscountCode::where('code',$discount_code)->first();
            $discountPrice = $discountController->calculateDiscountCode($discount_code,$order->tickets);

            if($discountPrice !=0){
                $total_price = (int)$total_price-(int)$discountPrice;
            }
        }

        if (!$payment_prof_id) {
            $created_payment_profile_id = $this->paymentController->createPaymentMethod($this->user['id'], $card);
            if ($created_payment_profile_id) {
                $payment_prof_id = $created_payment_profile_id;
            }
        }
//
        $transaction = $this->paymentController->chargeWithCustomerPaymentMethod($total_price, $this->user['customer_profile_id'], $payment_prof_id);

        if ($transaction) {
            //update order
            $order->user_id = $this->user['id'];
            $order->user_payment_id = $payment_prof_id;
            $order->transaction_key = $transaction->getTransId();

            $order->status = 'approved';
            if($donation_price){
              $order->donation_id=$donation['_id'];
              $order->donation_price=$donation_price;
            }
            if($discountPrice !=0){
                $order->discount_code_id = $disocunt['_id'];
                $order->discount_price = $discountPrice;
            }
            $order->save();


            //update related tickets statuses
              $order->tickets()->update(['status' => 'paid', 'user_id' => $this->user['id']]);
            //add email in queue
            dispatch((new SendEmailWithTickets($order['_id']))
                ->delay(Carbon::now()->addSeconds(5)));

        }else{
            abort(401,'something_is_wrong');
        }


        return $this->item($order, $transformer);

    }


    public function payWithPOS(Request $request, OrderTransformer $transformer)
    {
        $transaction = false;
        $this->validate($request, [
            'order_id' => 'required',
            'user_id' => 'required',
            'payment_method'=>'required',
            'channel'=>'required'
            // 'payment_prof_id' => 'required_without:card.number',
            // 'card.number' => 'required_without:payment_prof_id',
            // 'card.expiryMonth' => 'required_without:payment_prof_id',
            // 'card.expiryYear' => 'required_without:payment_prof_id',
            // 'card.cvv' => 'required_without:payment_prof_id',
        ]);


        $user_id = $request->input('user_id');
        $order_id = $request->input('order_id');
        $channel = $request->input('channel');
        $payment_method = $request->input('payment_method');
       
        $donation_price = $request->input('donation_price','');
        $discount_code = $request->input('discount_code',null);
        $discountPrice = 0;

        if($channel != 'POS')
        {
            abort(401, "Only POS processing allowed");
        }

        if($payment_method =='check' || $payment_method== 'card')
        {
            abort(401,'Payment method not supported');
        }
        //check if user exists
        $user = User::find($user_id);
        if (!$user) {
            abort(401, 'user_not_found');
        }

        $order = Order::find($order_id);
        if (!$order) {
            abort(401, 'order_not_found');
        }

        $event = Event::where('_id',$order->event_id)->first();
        $show = $event->show;


        $total_price = $order['total_price'];
        // including donation in order
        if($donation_price){
          $donation = Donation::create([
            'user_id'=>$user_id,
            'theater_id'=>$order['theater_id'],
            'price'=>$donation_price,
            'order_id'=>$order['_id'],
          ]);

            $total_price = (int)$total_price+(int)$donation_price;
        }
        //check discount Code
        if($discount_code){
            $discountController = new DiscountCodeController();
            $checkDisocuntCode = $discountController->checkDiscountCode($discount_code,$show['_id']);
            if($checkDisocuntCode != 'code_is_valid'){
                abort(401,$checkDisocuntCode);
            }
            $disocunt = DiscountCode::where('code',$discount_code)->first();
            $discountPrice = $discountController->calculateDiscountCode($discount_code,$order->tickets);

            if($discountPrice !=0){
                $total_price = (int)$total_price-(int)$discountPrice;
            }
        }

       
//
        $transaction = true;

        if ($transaction) {
            //update order
            $order->user_id = $this->user['id'];
            $order->transaction_key = str_random(7);
            $order->payment_method = $payment_method;
            $order->channel = $channel;

            $order->status = 'approved';
            if($donation_price){
              $order->donation_id=$donation['_id'];
              $order->donation_price=$donation_price;
            }
            if($discountPrice !=0){
                $order->discount_code_id = $disocunt['_id'];
                $order->discount_price = $discountPrice;
            }
            $order->save();


            //update related tickets statuses
              $order->tickets()->update(['status' => 'paid', 'user_id' => $this->user['id']]);
            

        }else{
            abort(401,'something_is_wrong');
        }


        return $this->item($order, $transformer);

    }


   public function getTicketsByOrder($orderId, TicketTransformer $transformer)
   {
      $tickets = Ticket::where('order_id',$orderId)->paginate(20);
        return $this->response->paginator($tickets, $transformer);
    }



}