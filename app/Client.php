<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'rfcClient',
    ];

    protected $table = 'clients';
}
