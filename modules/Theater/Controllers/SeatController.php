<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/27/2017
 * Time: 04:53 PM
 */

namespace Modules\Theater\Controllers;

use App\Models\Seat;
use Dingo\Api\Http\Request;
use App\Models\Stage;
use App\Models\Area;


use Modules\Theater\Transformers\SeatTransformer;

class SeatController extends Controller
{

    public function getSeat($id, SeatTransformer $transformer)
    {
        $seat = Seat::find($id);
        return $this->item($seat, $transformer);
    }

    public function createSeat(Request $request, SeatTransformer $transformer)
    {
        $this->validate($request, [
            'stage_id' => 'required',
            'area_id' => 'required',
            'row' => 'required',
            'num' => 'required',
        ]);

        $stage_id = $request->input('stage_id');
        $area_id = $request->input('area_id');
        $row = $request->input('row');
        $num = $request->input('num');


        if (!Stage::find($stage_id)->exists()) {
            abort(401, 'stage_not_found');
        }
        if (!Area::where(['_id' => $area_id, 'stage_id' => $stage_id])->exists()) {
            abort(401, 'area_not_found');
        }

        $seat = Seat::firstOrCreate([
            'stage_id' => $stage_id,
            'area_id' => $area_id,
            'row' => $row,
            'num' => $num,
        ]);

        $seat->save();

        return $this->item($seat, $transformer);
    }

    public function editSeat(Request $request, $id)
    {

    }

    public function getSeatList(Request $request, SeatTransformer $transformer)
    {
        $this->validate($request, [
            'stage_id' => 'required',
        ]);
        $per_page = (int)$request->input('per_page', 1000);
        $area_id = $request->input('area_id', '');
        $stage_id = $request->input('stage_id', '');

        if (Stage::where('id', $stage_id)->exists()) {
            abort(401, 'stage_not_found');
        }


        $seats = Seat::where(['stage_id' => $stage_id])->area($area_id)->paginate($per_page);
        return $this->response->paginator($seats, $transformer);
    }


}