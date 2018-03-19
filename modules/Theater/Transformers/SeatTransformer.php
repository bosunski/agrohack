<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:49 PM
 */

namespace Modules\Theater\Transformers;

use App\Models\Seat;
use League\Fractal;

class SeatTransformer extends Fractal\TransformerAbstract
{
    public function transform(Seat $seat)
    {
        return [
            'id'        => $seat->id,
            'stage_id'        => $seat->stage_id,
            'area_id'        => $seat->area_id,
            'row'      => $seat->row,
            'num'       =>$seat->num,
        ];
    }
}
