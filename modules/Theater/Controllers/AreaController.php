<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/27/2017
 * Time: 04:53 PM
 */

namespace Modules\Theater\Controllers;

use App\Models\Area;
use App\Models\Stage;
use Dingo\Api\Http\Request;
use Modules\Theater\Transformers\AreaTransformer;

class AreaController extends Controller
{

    // public function getArea(Request $request, AreaTransformer $transformer)
    // {
    //     $this->validate($request, [
    //         'stage_id' => 'required',
    //         'area_id' => 'required',
    //         'row' => 'required',
    //         'num' => 'required',
    //     ]);

    // }

    public function createArea(Request $request, AreaTransformer $transformer)
    {
        $this->validate($request, [
            'stage_id' => 'required',
            'name' => 'required',
            'seats_count' => 'required'
        ]);

        $stage_id = $request->input('stage_id');
        $name = $request->input('name');
        $seats_count = $request->input('seats_count');

        if (!Stage::find($stage_id)->exists()) {
            abort(401, 'stage_not_found');
        }

        $area = Area::create([
            'stage_id' => $stage_id,
            'name' => $name,
            'seats_count' => $seats_count
        ]);
        return $this->item($area, $transformer);
    }

    public function getAreaList($stage_id, Request $request, AreaTransformer $transformer)
    {
        if (!Stage::find($stage_id)->exists()) {
            abort(401, 'stage_not_found');
        }
        $areas = Area::where('stage_id',$stage_id)->paginate();
        return $this->response->paginator($areas, $transformer);
    }

    public function getArea($id, Request $request, AreaTransformer $transformer)
    {
        if (!Area::find($id)->exists()) {
            abort(401, 'area_not_found');
        }
        $area = Area::find($id);
        return $this->item($area, $transformer);

    }

    public function saveLayout(AreaTransformer $transformer, Request $request, $id)
    {
        $svgLayout = $request->input('svg_layout', null);
        $jsonLayout = $request->input('json_layout', null);

        $area = Area::find($id);

        if ($svgLayout && $jsonLayout) {
            $area->svg_layout = $svgLayout;
            $area->json_layout = $jsonLayout;
        }

        $area->save();
        return $this->item($area, $transformer);
    }

}