<?php

namespace App\Http\Controllers\Api\App;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\FullProduct;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function products(Request $request)
    {
        $products = [];
        $productsQuery= [];

        if (isset($request->provider)) {
            $productsQuery = Product::where('provider_id', '=', $request->provider)->get();
        } elseif (isset($request->category)) {
            $productsQuery = Product::where('category_id', '=', $request->category)->get();
        } elseif (isset($request->id)) {
            $productsQuery = Product::where('id', '=', $request->id)->get();
        } else {
            $productsQuery = Product::orderBy('updated_at', 'desc')->get();
        }

        foreach ($productsQuery as $product) {
            array_push($products, new FullProduct($product));
        }

        return response()->json($products, 200);
    }
}
