<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:49 PM
 */

namespace Modules\Ticket\Transformers;

use App\Models\Ticket;
use League\Fractal;

class TicketTransformer extends Fractal\TransformerAbstract
{
    public function transform(Ticket $ticket)
    {
        return [
          'id'=>$ticket->id,
          'user'=>$ticket->order->user,
          'event'=>$ticket->event,
          'seat'=>$ticket->seat,
          'area'=>$ticket->seat->area,
          'order'=>$ticket->order,
          'donation'=>$ticket->order->orderDonation(),
          'date'=>$ticket->date,
          'type'=>$ticket->type,
          'price'=>$ticket->price,
          'start_time'=>$ticket->start_time,
          'qr_code'=>$ticket->qr_code,
          'reference_code'=>$ticket->reference_code,
          'status'=>$ticket->status,
        ];
    }
}