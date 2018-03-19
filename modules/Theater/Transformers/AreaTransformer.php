<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:49 PM
 */

namespace Modules\Theater\Transformers;

use App\Models\Area;
use League\Fractal;

class AreaTransformer extends Fractal\TransformerAbstract
{
    public function transform(Area $area)
    {
        return [
            'id'        => $area->id,
            'stage_id'  => $area->stage_id,
            'stage_name'=>$area->stage->name,
            'name'      => $area->name,
            'seats'      => $area->seats_count,
            'svg_layout' => $area->svg_layout,
            'json_layout' => $area->json_layout,
        ];
    }
}
