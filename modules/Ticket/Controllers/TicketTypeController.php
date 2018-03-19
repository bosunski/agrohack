<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/20/2017
 * Time: 10:10 PM
 */

namespace Modules\Ticket\Controllers;


use App\Models\TicketType;
use Modules\Ticket\Transformers\TicketTypeTransformer;
use Dingo\Api\Http\Request;

class TicketTypeController extends Controller
{

    public function getTicketTypes(Request $request, TicketTypeTransformer $transformer)
    {
        $this->validate($request, [
            'theater_id' => 'required'
        ]);

        $theater_id = $request->input('theater_id');
        $per_page = $request->input('per_page', 10); //pagination

        $ticketTypes = TicketType::where('theater_id', $theater_id)->paginate($per_page);

        return $this->response->paginator($ticketTypes, $transformer);
    }

    public function createTicketType(Request $request, TicketTypeTransformer $transformer)
    {
        $this->validate($request, [
            'name'       => 'required',
            'theater_id' => 'required',
            'agency_id' => 'required'
        ]);

        $agency_id = $request->input('agency_id');
        $theater_id = $request->input('theater_id');
        $name = $request->input('name');
        $color = $request->input('color');
        $tikcetType = TicketType::create(['agency_id' => $agency_id, 'theater_id' => $theater_id, 'name' => $name, 'color' => $color]);

        return $this->item($tikcetType, $transformer);
    }

    public function deleteTicketType($id)
    {
            TicketType::destroy($id);

            return json_encode(['status' => 'success', 'message' => 'Type Deleted']);

    }
}