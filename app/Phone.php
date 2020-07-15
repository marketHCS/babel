<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'num_tel'
    ];

    protected $table = 'phones';
}
