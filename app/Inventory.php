<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'exist_inv',
        'product_id',
        'office_id',
        'product_size_id'
    ];

    protected $table = 'inventories';
}
