<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['id', 'sender_id', 'recipient_id', 'read', 'message'];
}
