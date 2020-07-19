<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellDetail extends Model
{
    protected $fillable = [
        'cantidad',
        'sell_id',
        'inventory_id',
        'product_id'
    ];

    protected $table = 'selldetails';
}
