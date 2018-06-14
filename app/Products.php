<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'category_id',
        'vendor_id',
        'title',
        'percentage_off',
        'description',
        'min_price',
        'max_price',
        'path1',
        'path2',
        'path3'
    ];
}
