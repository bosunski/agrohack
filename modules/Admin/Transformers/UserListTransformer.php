<?php

namespace Modules\Admin\Transformers;

use App\Models\User;
use App\Models\Agency;
use League\Fractal;

class UserListTransformer extends Fractal\TransformerAbstract
{
    public function transform(User $user)
    {
      
        return [
            'id'        =>$user->id,
            'name'      => $user->name,
            'email'     => $user->email,
            'account_type'   => $user->account_type,
            
            'tickets'=> 10,
            'total_amount'=>760,
            'created_at' => $user->created_at,
          
        ];
    }
}