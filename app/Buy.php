<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $fillable = [
        'dateBuy',
        'cost_com',
        'administrator_id',
        'provider_id'
    ];

    public function details()
    {
        return $this->hasMany('App\BuyDetail');
    }

    protected $table = 'buys';
}
