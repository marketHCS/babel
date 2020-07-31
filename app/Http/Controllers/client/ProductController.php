<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ImagesProduct;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $images = ImagesProduct::where('imagesproducts.product_id', '=', $product->id)->get();

        return view('client.product.show', compact('product', 'images'));
    }
}
