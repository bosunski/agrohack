<?php

namespace Modules\Event\Controllers;

use App\Helpers\ShowHelper;
use Modules\Event\Transformers\ShowTransformer;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Event;
use App\Models\CostMembers;
use App\Models\TicketType;
use App\Models\DirectorsOfShows;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function ticetTypes($show)
    {
        if ($show->ticket_type_ids) {
            foreach ($show->ticket_type_ids as $key => $ticket_type) {
                $returnData[$key]['ticketType'] = TicketType::find($ticket_type['id']);
                $returnData[$key]['price'] = $ticket_type['price'];
            }
            return $returnData;
        } else {
            return [];
        }

    }

    public function ticetTypesIds($show)
    {
        if ($show->ticket_type_ids) {
            foreach ($show->ticket_type_ids as $key => $ticket_type) {
                $returnData[$key] = $ticket_type['id'];
            }
            return $returnData;
        } else {
            return [];
        }
    }

    public function createShow(Request $request, ShowTransformer $transformer)
    {

        $this->validate($request, [
            'stage_id' => 'required',
            'agency_id' => 'required',
            'theater_id' => 'required',
            'location_id' => 'required',
            'name' => 'required'
        ]);

        $stage_id = $request->input('stage_id');
        $agency_id = $request->input('agency_id');
        $theater_id = $request->input('theater_id');
        $location_id = $request->input('location_id');
        $name = $request->input('name');
        $description = $request->input('description');

        //section 2
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $schedulingForSaving = $request->input('schedulingForSaving');
        $singleEvent = $request->input('singleEvent');

        //Section 3
        $dontationPopup = $request->input('donationPopup');
        $discountCode = $request->input('discountCode');
        $membershipPeriod = $request->input('membershipPeriod');
        $ticketTypes = $request->input('ticketTypes');
        $ticketTypePrices = $request->input('ticketTypesPrices');
        $packageDeal = $request->input('packageDeal');

        //section 4
        $geners_show = $request->input('gener_show');
        $types_show = $request->input('type_show');
        $show_directors = $request->input('show_directors');
        $cost_members = $request->input('cost_members');
        $production_size = $request->input('production_size');

///
        //show image
        if ($request->image != '') {
            $exploded = explode(',', $request->image);
            $decoded = base64_decode($exploded[1]);

            if (str_contains($exploded[0], 'jpeg'))
                $extension = 'jpg';
            else
                $extension = 'png';
            $filename = 'show-' . time() . "." . $extension;
            $destinationPath = public_path() . '/img/show/' . $filename;

            file_put_contents($destinationPath, $decoded);

            $dataForSave = [
                'stage_id' => $stage_id,
                'agency_id' => $agency_id,
                'theater_id' => $theater_id,
                'location_id' => $location_id,
                'name' => $name,
                'description' => $description,
                'image' => $filename
            ];

        } else {
            $dataForSave = [
                'stage_id' => $stage_id,
                'agency_id' => $agency_id,
                'theater_id' => $theater_id,
                'location_id' => $location_id,
                'name' => $name,
                'description' => $description,
            ];
        }
        $times = [];
        foreach ($schedulingForSaving as $scheduling) {
            foreach ($scheduling['days'] as $day) {
                foreach ($scheduling['times'] as $time) {
                    $times[$day][] = $time;
                }
            }
        }
        //section 2
        $dataForSave['start_date'] = $start_date;
        $dataForSave['end_date'] = $end_date;
        $dataForSave['repeating'] = 'week';
        $dataForSave['times'] = $times;


        $dataForSave['donation_popup'] = $dontationPopup;

        if (!empty($ticketTypes)) {
            foreach ($ticketTypes as $key => $ticket_type_id) {
                $dataForSave['ticket_type_ids'][$key]['id'] = $ticket_type_id;
                $dataForSave['ticket_type_ids'][$key]['name'] = TicketType::find($ticket_type_id)->name;
                $dataForSave['ticket_type_ids'][$key]['color'] = TicketType::find($ticket_type_id)->color;
                $dataForSave['ticket_type_ids'][$key]['price'] = $ticketTypePrices[$ticket_type_id]['price'];
            }
        }


        $savedShow = Show::create($dataForSave);


        if (!empty($membershipPeriod)) {
            foreach ($membershipPeriod as $period_id) {
                $savedShow->membershipPeriods()->attach($period_id);
            }
        }
        if (!empty($discountCode)) {
            foreach ($discountCode as $code_id) {
                $savedShow->discountCodes()->attach($code_id);
            }
        }
        if (!empty($packageDeal)) {
            foreach ($packageDeal as $deal_id) {
                $savedShow->packageDeals()->attach($deal_id);
            }
        }
        //section 4
        if (!empty($geners_show)) {
            foreach ($geners_show as $gener_show_id) {
                $savedShow->showGeners()->attach($gener_show_id);
            }
        }
        if (!empty($types_show)) {
            foreach ($types_show as $type_show_id) {
                $savedShow->showTypes()->attach($type_show_id);
            }
        }


        $dataForSave['production_size'] = $production_size;
        if (!empty($cost_members)) {
            foreach ($cost_members as $cost_member) {
                if ($cost_member['name'] != "") {
                    $savedCostMember = CostMembers::create([
                        'name' => $cost_member['name'],
                        'agency_id' => $agency_id
                    ]);
                    $savedShow->costMembers()->attach($savedCostMember['id']);
                }
            }
        }
        if (!empty($show_directors)) {
            foreach ($show_directors as $show_director) {
                if ($show_director['name'] != "") {
                    $savedShowDirector = DirectorsOfShows::create([
                        'name' => $show_director['name'],
                        'agency_id' => $agency_id
                    ]);
                    $savedShow->directorsOfShow()->attach($savedShowDirector['id']);
                }

            }
        }

        // return json_encode(ShowHelper::showSchedulFormat($savedShow));
        // createing event for each SHow
        //ToDo:: remove to event Controller
        $showSchedul = ShowHelper::showSchedulFormat($savedShow);
        foreach ($showSchedul as $schedule) {
            foreach ($schedule['times'] as $time) {
                Event::create([
                    'agency_id' => $agency_id,
                    'theater_id' => $theater_id,
                    'stage_id' => $stage_id,
                    'show_id' => $savedShow['_id'],
                    'date' => $schedule['date'],
                    'week_day' => $schedule['week_day_name'],
                    'event_type' => 'repeat',
                    'start_time' => $time['start'],
                    'end_time' => $time['end'],
                ]);
            }
        }
        foreach ($singleEvent as $event) {
            if ($event['date']) {
                Event::create([
                    'agency_id' => $agency_id,
                    'theater_id' => $theater_id,
                    'stage_id' => $stage_id,
                    'show_id' => $savedShow['_id'],
                    'date' => date('Y-m-d', strtotime($event['date'])),
                    // 'week_day'=>Carbon::createFromFormat($event['date'],'Y-m-d')->dayOfWeek(),
                    'event_type' => 'single',
                    'start_time' => $event['start_time'],
                    'end_time' => $event['end_time'],
                ]);
            }

        }


        return response()->json(['show' => $savedShow]);

    }

    public function getTheaterShows(Request $request, ShowTransformer $transformer)
    {
        $this->validate($request, [
            'theater_id' => 'required',
        ]);

        $theater_id = $request->input('theater_id');
        $per_page = $request->input('per_page', 10);
        $name = $request->input('name');
        $arciverd_date = $request->input('arciverd_date', '');
        $end_date = $request->input('end_date', '');
        $shows = Show::where(['theater_id' => $theater_id,])->archived($arciverd_date)->name($name)->paginate($per_page);

        return $this->response->paginator($shows, $transformer);
    }

    public function getAgencyShows(Request $request, ShowTransformer $transformer)
    {
        $this->validate($request, [
            'agency_id' => 'required',
        ]);

        $agency_id = $request->input('agency_id');
        //$per_page = $request->input('per_page', 10);
        //$name = $request->input('name');
        //$arciverd_date = $request->input('arciverd_date', '');
        //$end_date = $request->input('end_date', '');
        $shows = Show::where(['agency_id' => $agency_id,])->paginate(2000);

        return $this->response->paginator($shows, $transformer);
    }

    public function getSuperAdminShows(Request $request, ShowTransformer $transformer)
    {
        /*$this->validate($request, [
            'agency_id' => 'required',
        ]);*/

        $agency_id = $request->input('agency_id');

        $per_page = $request->input('per_page', 2000);
        //$name = $request->input('name');
        //$arciverd_date = $request->input('arciverd_date', '');
        //$end_date = $request->input('end_date', '');

        $shows = Show::paginate($per_page);

        return $this->response->paginator($shows, $transformer);
    }

    public function getTheaterActiveShows(Request $request, ShowTransformer $transformer)
    {
        $this->validate($request, [
            'theater_id' => 'required',
        ]);

        $theater_id = $request->input('theater_id');
        $per_page = $request->input('per_page', 10);
        $name = $request->input('name');
        $end_date = $request->input('end_date', '');

        $shows = Show::with(['events', 'events.tickets' => function ($q) {
            $q->where('status', '!=', 'reserved');
        }, 'stage', 'events.orders'])->where(['theater_id' => $theater_id])
            ->where('end_date', '>', date("Y-m-d") . 'T20:00:00.000Z')
            ->name($name)->paginate($per_page);

        return $this->response->paginator($shows, $transformer);
    }

    public function getTheaterArchivedShows(Request $request, ShowTransformer $transformer)
    {
        $this->validate($request, [
            'theater_id' => 'required',
        ]);

        $theater_id = $request->input('theater_id');
        $per_page = $request->input('per_page', 10);
        $name = $request->input('name');
        $end_date = $request->input('end_date', '');
        $arciverd_date = $request->input('arciverd_date', date("Y-m-d") . 'T20:00:00.000Z');
        $shows = Show::with([
            'events',
            'events.tickets' => function ($q) {
                $q->where('status', '!=', 'reserved');
            },
            'stage',
            'events.orders'
        ])->where(['theater_id' => $theater_id])->archived($arciverd_date)
            ->name($name)->orderBy('end_date', 'desc')->paginate($per_page);

        return $this->response->paginator($shows, $transformer);
    }

    public function getShow(Request $request, ShowTransformer $transformer, $id)
    {
        $show = Show::where('_id', $id)->first();

        $show['TicketTypes'] = $this->ticetTypes($show);
        $show['TicketTypesIds'] = $this->ticetTypesIds($show);
        $show['Theater'] = $show->theater;

        return $this->item($show, $transformer);
    }


    public function updateShow(Request $request, ShowTransformer $transformer, $id)
    {
        $show = Show::find($id);
        //general Section
        $name = $request->input('name', '');
        $description = $request->input('description', null);
        $stage_id = $request->input('stage_id', '');
        $location_id = $request->input('location_id', '');
        $showGeners = $request->input('showGeners', '');
        $showTypes = $request->input('showTypes', '');

        //scheduling section
        $start_date = $request->input('start_date', '');
        $end_date = $request->input('end_date', '');
        $times = $request->input('times', '');

        $membershipPeriods = $request->input('membershipPeriods', '');
        $packageDeals = $request->input('packageDealIds', '');
        $discountCodes = $request->input('discountCodes', '');
        $ticketTypeIds = $request->input('ticketTypesIds','');
        $selectedticketTypesPrices= $request->input('selectedticketTypesPrices','');


        if ($name) {
            $show->name = $name;
        }
        if ($description) {
            $show->description = $description;
        }
        if ($stage_id) {
            $show->stage_id = $stage_id;
            $show->events()->update(['stage_id' => $stage_id]);
        }
        if ($location_id) {
            $show->location_id = $location_id;
        }
        if ($showGeners) {
            $show->showGeners()->sync($showGeners);
        }
        if ($showTypes) {
            $show->showTypes()->sync($showTypes);
        }
        if ($location_id) {
            $show->location_id = $location_id;
        }
        if ($start_date) {
            $show->start_date = $start_date;
            ShowHelper::updateEvents($id, $start_date, $end_date);
        }
        if ($end_date) {
            $show->end_date = $end_date;
            ShowHelper::updateEvents($id, $start_date, $end_date);
        }


        // if ($repeating) {
        //     $show->repeating = $repeating;
        // }
        if ($times) {
            $show->times = $times;
        }
        if (isset($membershipPeriods)) {
            $show->membershipPeriods()->sync($membershipPeriods);
        }
        if (isset($packageDeals)) {
            $show->packageDeals()->sync($packageDeals);
        }
        if (isset($discountCodes)) {
            $show->discountCodes()->sync($discountCodes);
        }

        if($ticketTypeIds){
            foreach ($ticketTypeIds as $key => $ticket_type_id) {
                $dataTicketTypeForSave[$key]['id'] = $ticket_type_id;
                $dataTicketTypeForSave[$key]['name'] = TicketType::find($ticket_type_id)->name;
                $dataTicketTypeForSave[$key]['color'] = TicketType::find($ticket_type_id)->color;
                $dataTicketTypeForSave[$key]['price'] = $selectedticketTypesPrices[$ticket_type_id]['price'];
            }
            $show->ticket_type_ids = $dataTicketTypeForSave;
        }
        $show->save();

        return json_encode($show);

    }

    public function removeShow(Request $request, ShowTransformer $transformer, $id)
    {

        $show = Show::find($id);
        \File::delete(public_path() . '/img/show/' . $show['image']);
        $show->events()->delete($id);
        $show->delete();
        return response()->json(['status' => 'success', 'Show Removed!']);

    }
}
