<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street',
        'exteriorNumberAddress',
        'interiorNumberAddress',
        'suburb',
        'city',
        'estate',
        'cp'
    ];

    protected $table = 'addresses';
}
