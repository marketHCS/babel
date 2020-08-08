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
      'size',
      'descuento'
    ];

    /*
    Size ids:
      1 = chica;
      2 = mediana;
      3 = grande;
    */

    protected $table = 'selldetails';
}
