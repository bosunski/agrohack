<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id', 'name', 'description', 'price', 'user_id', 'picture'];

    public $incrementing = false;
}
