<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:43 PM
 */

namespace Modules\Theater\Controllers;


use Modules\Theater\Transformers\StageTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//Tranformers
use Modules\Admin\Transformers\AgencyTransformer;
use Modules\Admin\Transformers\UserTransformer;
//Models
use App\Models\Stage;
use DateInterval;
use DatePeriod;
use DateTime;
use App\Helpers\ShowHelper;
use App\Helpers\StageHelper;

class StagesController extends Controller
{
    public function createStages(Request $request)
    {
        $this->validate($request, [
            'agency_id' => 'required',
            'location_id' => 'required',
            'theater_id' => 'required'
        ]);

        $name = $request->input('name');
        $agency_id = $request->input('agency_id');
        $location_id = $request->input('location_id');
        $theater_id = $request->input('theater_id');
        $seats_number = $request->input('seats_number');

        $stage = Stage::create([
            'name' => $name,
            'agency_id' => $agency_id,
            'location_id' => $location_id,
            'theater_id' => $theater_id,
            'seats_number' => $seats_number,
        ]);

        return $stage;
    }


    private function getDatesBettwenTwoDates($startDate, $endDate)
    {
        $begin = new DateTime($startDate);
        $end = new DateTime($endDate);
        $end = $end->modify('+1 day');

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval, $end);

        foreach ($daterange as $key => $date) {
            $dates[$key]['date'] = $date->format("Y-m-d");
            $dates[$key]['week_day_name'] = strtolower(date('l', strtotime($date->format("Y-m-d"))));

        }
        return $dates;
    }


    public function getStage(StageTransformer $transformer, Request $request, $id)
    {
        $stage = Stage::find($id);
        $stage['currentPlaingShow'] = StageHelper::getCurrentPlaingShow($stage->_id);
        $stage['showsToday'] = StageHelper::getEventsToday($stage->_id);
        $stage['nextShow'] = StageHelper::nextPlaingShow($stage->_id);
        return $this->item($stage, $transformer);
    }

    public function getLocationStages(StageTransformer $transformer, Request $request)
    {

        $this->validate($request, [
            'location_id' => 'required',
        ]);

        $agency_id = $request->input('agency_id');
        $location_id = $request->input('location_id');
        $per_page = $request->input('per_page', 10);

        $stage = Stage::where(['location_id' => $location_id])->paginate($per_page);

        return $this->response->paginator($stage, $transformer);

    }

    public function getAgencyStages(StageTransformer $transformer, Request $request)
    {
        $this->validate($request, [
            'agency_id' => 'required',
        ]);

        $agency_id = $request->input('agency_id');
        $per_page = $request->input('per_page', 10);

        $stage = Stage::where(['agency_id' => $agency_id])->paginate($per_page);

        return $this->response->paginator($stage, $transformer);

    }

    public function getAgencyStagesInList(StageTransformer $transformer, Request $request)
    {
        $this->validate($request, [
            'agency_id' => 'required',
        ]);

        $agency_id = $request->input('agency_id');
        $per_page = $request->input('per_page', 2000);

        $stage = Stage::where(['agency_id' => $agency_id])->paginate($per_page);

        return $this->response->paginator($stage, $transformer);

    }

    public function getSuperadminStagesInList(StageTransformer $transformer, Request $request)
    {
        /*$this->validate($request, [
            'agency_id' => 'required',
        ]);*/

        $agency_id = $request->input('agency_id');
        $per_page = $request->input('per_page', 2000);

        $stage = Stage::paginate($per_page);

        return $this->response->paginator($stage, $transformer);

    }

    public function getTheaterStages(StageTransformer $transformer, Request $request)
    {
        $this->validate($request, [
            'theater_id' => 'required',
        ]);

        $theater_id = $request->input('theater_id');
        $per_page = $request->input('per_page', 10);

        $stages = Stage::where(['theater_id' => $theater_id])->paginate($per_page);
        foreach ($stages as $stage) {
            $stage['currentPlaingShow'] = StageHelper::getCurrentPlaingShow($stage->_id);
            $stage['showsToday'] = StageHelper::getEventsToday($stage->_id);
            $stage['nextShow'] = StageHelper::nextPlaingShow($stage->_id);
        }

        return $this->response->paginator($stages, $transformer);

    }

    public function editStage(StageTransformer $transformer, Request $request, $id)
    {
        $name = $request->input('name', null);
        $location_id = $request->input('location_id', null);
        $seats_number = $request->input('seats_number', null);

        $stage = Stage::find($id);

        if ($name) {
            $stage->name = $name;
        }
        if ($location_id) {
            $stage->location_id = $location_id;
        }
        if ($seats_number) {
            $stage->seats_number = $seats_number;
        }

        $stage->save();
        return $this->item($stage, $transformer);
    }

    public function saveStage(StageTransformer $transformer, Request $request, $id)
    {
        $svgLayout = $request->input('svg_layout', null);
        $jsonLayout = $request->input('json_layout', null);

        $stage = Stage::find($id);

        if ($svgLayout && $jsonLayout) {
            $stage->svg_layout = $svgLayout;
            $stage->json_layout = $jsonLayout;
        }

        $stage->save();
        return $this->item($stage, $transformer);
    }

    public function removeStage(Request $request)
    {

        $this->validate($request, [
            'stage_id' => 'required',
            'agency_id' => 'required',
        ]);
        $agency_id = $request->input('agency_id');
        $stage_id = $request->input('stage_id');
        $stage = Stage::find($stage_id);
        $stage->delete();

        return response()->json(['name' => $stage->name, 'message' => 'Stage Removed'], 200);

    }
}