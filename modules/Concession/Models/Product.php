<?php

namespace Modules\Concession\Models;


use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use MongoDB\BSON\UTCDatetime;
use Carbon\Carbon;
use DateTime;
use MongoDate;

class Product extends Model
{
    protected $fillable = [
        'id', 'name', 'category_id', 'price', 'picture'
    ];

    public function category()
    {
        return $this->hasOne('Modules\Concession\Models\Category');
    }
}
