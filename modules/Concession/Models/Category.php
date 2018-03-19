<?php

namespace Modules\Concession\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use MongoDB\BSON\UTCDatetime;
use Carbon\Carbon;
use DateTime;
use MongoDate;

class Category extends Model
{
    protected $fillable = ['id', 'name', 'description', 'picture'];
}
