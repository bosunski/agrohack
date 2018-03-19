<?php

namespace Modules\Admin\Transformers;

use App\Models\User;
use App\Models\Agency;
use League\Fractal;

class UserTransformer extends Fractal\TransformerAbstract
{
    public function transform(User $user)
    {
        $purchased = $user->purchasedTickets();
        return [
            'id'            => $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'account_type'  => $user->account_type,
            'created_at'    => $user->created_at,
            'role'          => $user->role,
            'agency'        => $user->agency,
            'orders'        => $user->orders,
            'tickets'       => $purchased['total'],
            'ticketsCost'   => $purchased['amount'],
            'showGenres'    => $user->showGenres,
            'showCategory'  => $user->showCategory,
            'showDiscount'  => $user->showDiscount,
            'showDonation'  => $user->showDonation,
            'showTickets'   => $user->showTickets,
            'theater'       => $user->theater,
            'events'        => $user->events,
            'theater'       => $user->theater_id,
            'timezone'      => $user->theater
        ];
    }
}