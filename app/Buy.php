<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $fillable = [
        'cost_com',
        'administrator_id',
        'provider_id',
        'concepto_compra',
        'status_id'
    ];

    public function details()
    {
        return $this->hasMany('App\BuyDetail');
    }

    protected $table = 'buys';
}
