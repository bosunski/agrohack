<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:49 PM
 */

namespace Modules\Admin\Transformers;

use App\Models\Theater;
use League\Fractal;

class TheaterTransformer extends Fractal\TransformerAbstract
{
    public function transform(Theater $theater)
    {
        return [
            'id'        => $theater->id,
            'name'      => $theater->name,
            'status'    => $theater->status,
            'phone'     =>  $theater->phone,
            'email'     =>  $theater->email,
            'sub_domain'=>  $theater->sub_domain,
            'address'   => $theater->address,
            'postal'    =>  $theater->postal,
            'city'		=> $theater->city,
            'state'		=> $theater->state,
            'country'	=> $theater->country,
            'created_at' => $theater->created_at,
            'gtm_body' =>$theater->gtm_body,
            'gtm_header'=>$theater->gtm_header,
        ];
    }
}