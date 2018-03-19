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
use App\Models\Stage;

class StageTransformer extends Fractal\TransformerAbstract
{
    public function transform(Stage $stage)
    {
        return [
            'id' => $stage->id,
            'name' => $stage->name,
            'location' => $stage->location,
            'agency_id' => $stage->agency_id,
//            'seats_number' => $stage->seats_number,
            'svg_layout' => $stage->svg_layout,
            'json_layout' => $stage->json_layout,
            'created_at' => $stage->created_at,
            'shows' => $stage->shows,
            'currentPlaingShow' => $stage->currentPlaingShow,
            'showsToday' => $stage->showsToday,
            'nextShow' => $stage->nextShow,
            'areas'=>$stage->areas,
            'seats_count'=>$stage->seats->count()
        ];
    }
}
