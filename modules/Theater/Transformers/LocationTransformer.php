<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:49 PM
 */

namespace Modules\Theater\Transformers;

use App\Models\Location;
use League\Fractal;

class LocationTransformer extends Fractal\TransformerAbstract
{
    public function transform(Location $location)
    {
        return [
            'id'            => $location->id,
            'user'          => $location->user,
            'agency'        => $location->agency,
            'name'          => $location->name,
            'address'       => $location->address,
            'city'          => $location->city,
            'description'   => $location->description,
            'email'         => $location->email,
            'phone'         => $location->phone,
            'image'         => $location->image,

        ];
    }
}