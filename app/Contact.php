<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['id', 'user_id', 'contact_id', 'accepted'];
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'contact_id');
    }
}
