<?php
/**
 * Created by PhpStorm.
 * User: arm-g
 * Date: 12/22/2017
 * Time: 8:41 PM
 */

namespace Modules\Ticket\Transformers;

use App\Models\Order;
use League\Fractal;
use App\Models\DiscountCode;
use App\Models\Donation;

class OrderTransformer extends Fractal\TransformerAbstract
{
    public function transform(Order $order)
    {
        return [
            "id"                    => $order->id,
            "user"                  => $order->user,
             "user_payment_id"      => $order->user_payment_id,
             "event"                => $order->event,
             "theater_id"           => $order->theater_id,
             'agency_id'            => $order->agency_id,
             "created_at"           => $order->created_at,
             "total_price"          => $order->total_price,
             "tickets_count"        => $order->tickets->count(),
             "status"               => ucfirst($order->status),
             "discounts"            => [],//$this->getDiscounts($order->event->show->discount_code_ids),
             "donations"            => Donation::where('order_id', $order->id)->first()
       ];
    }

    private function getDiscounts($discount_ids)
    {
        $data = [];
        if (!empty($discount_ids)) {
            foreach ($discount_ids as $id) {
                $data[] = DiscountCode::where('_id', $id)->first();
            }
            return $data;
        }
        return [];
    }
}