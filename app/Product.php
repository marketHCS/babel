<?php

namespace App;

use App\Category;
use App\Provider;
use App\WishList;
use App\BuyDetail;
use App\Inventory;
use App\ImagesProduct;
use Illuminate\Database\Eloquent\Model;

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

    public function statusProduct()
    {
        return $this->hasOne(StatusProducts::class, 'id', 'statusProduct_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function provider()
    {
        return $this->hasOne('App\Provider', 'id', 'provider_id');
    }

    public function buyDetails()
    {
        return $this->hasMany(BuyDetail::class);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function wishList()
    {
        return $this->belongsTo(WishList::class);
    }

    protected $table = 'products';
}
