<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:49 PM
 */

namespace Modules\Event\Transformers;

use App\Models\Event;
use League\Fractal;

class EventTransformer extends Fractal\TransformerAbstract
{
    public function transform(Event $event)
    {
        return [
            'id'        => $event->id,
            'name'      => $event->name,
            'gener'     => $event->gener,
            'agency'    => $event->agency,
            'theater'   => $event->theater,
            'show'      => $event->show,
            'event_type'=> $event->event_type,
            'date'      => $event->date,
            'start_time'=> $event->start_time,
            'end_time'  => $event->end_time,
            'tickets'   => $event->tickets,
            'tickets_count'   => $event->tickets->count()
        ];
    }
}