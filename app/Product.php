<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ImagesProduct;

class Product extends Model
{
    protected $fillable = [
      'statusProduct_id', //
      'nameProduct', //
      'description_prod',
      'costo_prod', //
      'precio_prod', //
      'descuento', //
      'material_prod', //
      'category_id', //
      'provider_id', //
    ];

    public function imagesProduct()
    {
        return $this->hasMany(ImagesProduct::class);
    }

    public function buyDetails()
    {
        return $this->hasMany('App\BuyDetails');
    }

    protected $table = 'products';
}
