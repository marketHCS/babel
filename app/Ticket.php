<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'fec_fac'
    ];

    protected $table = 'tickets';
}
