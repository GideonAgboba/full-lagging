<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'vendor_id',
        'product_id',
        'title',
        'percentage_off',
        'min_price',
        'max_price',
        'path'
    ];
}
