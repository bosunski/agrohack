<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:49 PM
 */

namespace Modules\Ticket\Transformers;

use App\Models\Donation;
use League\Fractal;

class DonationTransformer extends Fractal\TransformerAbstract
{
    public function transform(Donation $donation)
    {
        return [
            'id'        => $donation->id,
            'order'     => $donation->order,
            'price'     => $donation->price

        ];
    }
}