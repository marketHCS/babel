<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'fec_env', 'fec_ent'
    ];

    protected $table = 'shipments';
}
