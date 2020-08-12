<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable = [
        'created_at',
        'updated_at',
        'monto_pago',
        'status_id',
        'user_id',
        'address_id',
        'name',
        'phone',
        'shipment_id'
    ];

    protected $table = 'sells';
}
