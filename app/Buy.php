<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $fillable = [
        'fec_com', 'pago_com'
    ];

    protected $table = 'buys';
}
