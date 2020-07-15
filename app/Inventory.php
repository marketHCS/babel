<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'exist_inv', 'stat_inv', 'descuento'
    ];

    protected $table = 'inventories';
}
