<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nameProduct', 'desc_prod', 'costo_prod', 'precio_prod', 'mat_prod',
        'img_prod'
    ];

    protected $table = 'products';
}
