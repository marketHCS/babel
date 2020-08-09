<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $fillable = [
        'id',
        'tipo_pago',
        'receipt_email',
        'status',
        'amount',
        'sell_id',
    ];

    protected $table = 'pays';
}
