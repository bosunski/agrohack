<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/10/2017
 * Time: 3:42 PM
 */

namespace Modules\Ticket\Transformers;

use App\Models\DiscountCode;
use League\Fractal;

class DiscountCodeTransformer extends Fractal\TransformerAbstract
{
    public function transform(DiscountCode $discountCode)
    {
        //percentage or fixed
        $array = [
            'id' => $discountCode->id,
            'name' => $discountCode->name,
            'start' => $discountCode->start,
            'end' => $discountCode->end,
            'type' => ucfirst($discountCode->type),
            'ticket_types' => $discountCode->ticketTypes,
            'qr_code' => $discountCode->qr_code,
            'code' =>$discountCode->code,
            'limit' => $discountCode->limit,
            'price'=>$discountCode->price,
            'percent'=>$discountCode->percent,
            'used'=>$discountCode->used

        ];

        return $array;

    }
}