<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyDetail extends Model
{
    protected $fillable = [
        'cantidad_com',
        'buy_id',
        'product_id',
        'inventory_id'
    ];

    public function buy()
    {
        return $this->belongsTo('App\Buy');
    }

    protected $table = 'buydetails';
}
