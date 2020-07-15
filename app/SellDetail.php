<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellDetail extends Model
{
    protected $fillable = [
        'cantidad'
    ];
    protected $table = 'selldetails';
}
