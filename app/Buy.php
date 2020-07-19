<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $fillable = [
        'dateBuy',
        'cost_com',
        'administrator_id'
    ];

    protected $table = 'buys';
}
