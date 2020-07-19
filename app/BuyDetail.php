<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyDetail extends Model
{
    protected $fillable = [
        'cantidad_com',
        'cost_com',
        'buy_id',
        'product_id',
        'inventory_id'
    ];

    protected $table = 'buydetails';
}
