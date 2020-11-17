<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class StatusProducts extends Model
{
    protected $fillable=[
      'nameStatus'
    ];

    protected $hidden = [
      'created_at',
      'updated_at'
    ];

    protected $table = 'statusproducts';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
