<?php

namespace App;

use App\User;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $fillable = [
              'product_id',
              'user_id'
            ];

    protected $table = 'wish_lists';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
