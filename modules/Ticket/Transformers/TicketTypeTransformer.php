<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:49 PM
 */

namespace Modules\Ticket\Transformers;

use App\Models\TicketType;
use League\Fractal;

class TicketTypeTransformer extends Fractal\TransformerAbstract
{
    public function transform(TicketType $ticketType)
    {
        return [
            'id'        => $ticketType->id,
            'name'      => $ticketType->name,
            'color'     => $ticketType->color,
        ];
    }
}