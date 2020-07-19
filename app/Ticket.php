<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'fechaFactura',
        'sell_id',
        'buy_id'
    ];

    protected $table = 'tickets';
}
