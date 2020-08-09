<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'id',
        'url',
        'sell_id',
        'customer_stripe_id'
    ];

    protected $table = 'tickets';
}
