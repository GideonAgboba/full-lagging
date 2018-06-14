<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyDeals extends Model
{
    protected $fillable = [
       'path',
       'category',
       'min_price',
       'max_price',
       'title',
       'available',
       'soldout',
       'user_id'
    ];
}
