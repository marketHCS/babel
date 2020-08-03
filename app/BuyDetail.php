<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyDetail extends Model
{
    protected $fillable = [
        'cantidad_com',
        'costoProduct',
        'buy_id',
        'product_id',
        'inventory_id',
        'eq_s',
        'eq_m',
        'eq_g',
        'ec_s',
        'ec_m',
        'ec_g',
        'eg_s',
        'eg_m',
        'eg_g',
    ];

    public function buy()
    {
        return $this->belongsTo('App\Buy');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }



    protected $table = 'buydetails';
}
