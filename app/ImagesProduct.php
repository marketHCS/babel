<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Product;

class ImagesProduct extends Model
{
    protected $fillable = [
      'url',
      'product_id'
  ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    protected $table = 'imagesProducts';

    public function getGetImageAttribute()
    {
        if ($this->url) {
            return url("$this->url");
        }
    }
}
