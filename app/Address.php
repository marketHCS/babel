<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street', 'exteriorNumberAddress', 'interiorNumberAddress'
    ];

    protected $table = 'addresses';
}
