<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellDetail extends Model
{
    protected $fillable = [
      'costProduct',
      'cantidad',
      'sell_id',
      'inventory_id',
      'product_id',
      'size'
    ];

    protected $table = 'selldetails';
}
