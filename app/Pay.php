<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $fillable = [
        'fec_pago',
        'tipo_pago',
        'sell_id',
        'but_id'
    ];

    protected $table = 'pays';
}
