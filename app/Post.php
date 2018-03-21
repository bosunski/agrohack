<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id', 'category_id', 'title', 'content'];
    public $incrementing = false;
}
