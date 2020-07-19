<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'statusProduct_id',
      'nameProduct',
      'description_prod',
      'costo_prod',
      'precio_prod',
      'descuento',
      'material_prod',
      'img_prod',
      'type_id',
      'category_id',
      'provider_id',
      'size_id'
    ];

    protected $table = 'products';
}
