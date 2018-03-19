<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/17/2017
 * Time: 5:49 PM
 */

namespace Modules\Event\Transformers;

use App\Models\Show;
use League\Fractal;

class ShowTransformer extends Fractal\TransformerAbstract
{
    public function transform(Show $show)
    {
        return [
            'id'                => $show->id,
            'name'              => $show->name,
            'description'       => $show->description,
            'image'             => $show->image,
            'times'             => $show->times,
            'start_date'        => $show->start_date,
            'end_date'          => $show->end_date,
            'repeating'         => $show->repeating,
            'stage'             => $show->stage,
            'location'          => $show->location,
            'directorsOfShow'   => $show->directorsOfShow,
            'costMembers'       => $show->costMembers,
            'costMembersIds'    => $show->cost_members_ids,
            'ticetTypes'        => $show->TicketTypes,
            'Theater'           => $show->Theater,
            'showTypes'         => $show->showTypes,
            'showTypesIds'      => $show->type_ids,
            'showGeners'        => $show->showGeners,
            'showGenersIds'     => $show->gener_ids,
            'packageDeals'      => $show->packageDeals,
            'packageDealIds'    => $show->package_deal_ids,
            'discountCodes'     => $show->discountCodes,
            'discountCodeIds'   => $show->discount_code_ids,
            'donation_popup'    => $show->donation_popup,
            'membershipPeriods' => $show->membershipPeriods,
            'memebershipIds'    => $show->membership_period_ids,
            'time_now'          => date("h:m A"),
            'events'            => $show->events,
            'ticket_type_ids'   => $show->ticket_type_ids,
            'TicketTypesIds'    =>$show->TicketTypesIds
            // 'tickets'           => $show->events->tickets

         ];
    }
}