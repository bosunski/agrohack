<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:49 PM
 */

namespace Modules\Admin\Transformers;

use App\Models\Agency;
use League\Fractal;

class AgencyTransformer extends Fractal\TransformerAbstract
{
    public function transform(Agency $agency)
    {
        return [
            'id'        => $agency->id,
            'name'      => $agency->name,
            'status'    => $agency->status,
            'phone'     =>  $agency->phone,
            'email'     =>  $agency->email,
            'address'   => $agency->address,
            'postal'    =>  $agency->postal,
            'city'		=> $agency->city,
            'state'		=> $agency->state,
            'country'	=> $agency->country
        ];
    }
}