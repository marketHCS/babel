<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyDetail extends Model
{
    protected $fillable = [
        'cantidad_com'
    ];

    protected $table = 'buydetails';
}
