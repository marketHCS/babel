<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'id',
        'eq_s',
        'eq_m',
        'eq_g',
        'ec_s',
        'ec_m',
        'ec_g',
        'eg_s',
        'eg_m',
        'eg_g',
        'product_id',
    ];

    protected $table = 'inventories';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
