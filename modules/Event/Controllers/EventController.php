<?php

namespace Modules\Event\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

use Modules\Event\Transformers\EventTransformer;

class EventController extends Controller
{

    public function createEvent(EventTransformer $transformer, Request $request)
    {
        $this->validate($request, [
            'agency_id' => 'required',
            'theater_id' => 'required'
        ]);

        $agency_id = $request->input('agency_id');
        $name = $request->input('name');
        $title = $request->input('titile');
        $gener = $request->input('gener');
        $theater_id = $request->input('theater_id');

        $event = Event::create(['name' => $name, 'title' => $title, 'gener' => $gener, 'agency_id' => $agency_id, 'theater_id' => $theater_id]);

        return $this->item($event, $transformer);

    }

    public function findEvent(EventTransformer $transformer, Request $request){
        $this->validate($request, [
            'theater_id' => 'required',
        ]);

        $theater_id = $request->input('theater_id');
        $stage_id =$request->input('stage_id','');
        $date = $request->input('date','');
        $start_time = $request->input('start_time','');
        $from = $request->input('from','');
        $to = $request->input('to','');
        $end_time = $request->input('end_time');
        $per_page = $request->input('per_page');

        $events = Event::where('theater_id',$theater_id)->stage($stage_id)
            ->date($date)
            ->from($from)
            ->to($to)
            ->startTime($start_time)
            ->endTime($end_time)
            ->orderBy('date')
            ->paginate($per_page);
        return $this->response->paginator($events, $transformer);
    }
    public function getEvent(EventTransformer $transformer, Request $request)
    {
        $this->validate($request, [
            'event_id' => 'required',
        ]);
        $event_id = $request->input('event_id');

        $event = Event::find($event_id);

        return $this->item($event, $transformer);

    }

    public function getAgencyEvents(EventTransformer $transformer, Request $request)
    {
        $this->validate($request, [
            'agency_id' => 'required',
        ]);
        $agency_id = $request->input('agency_id');
        $per_page = $request->input('per_page', 10); //pagination


        $events = Event::where('agency_id', $agency_id)->paginate($per_page);

        $this->response->paginator($events, $transformer);
    }

    public function getLocationEvents(EventTransformer $transformer, Request $request)
    {
        $this->validate($request, [
            'location_id' => 'required',
        ]);
        $location_id = $request->input('location_id');
        $per_page = $request->input('per_page', 10); //pagination

        $events = Event::where('location_id', $location_id)->paginate($per_page);

        $this->response->paginator($events, $transformer);
    }

    public function editEvent(EventTransformer $transformer, Request $request){
        $this->validate($request, [
            'event_id' => 'required',
        ]);


    }
}