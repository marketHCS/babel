<?php

namespace App\Http\Controllers\Api\App;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\WishListElement;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('consults');
    }

    public function cart(Request $request)
    {
        $ids = $request->ids;
        $products = [];
        for ($i = 0; $i < count($ids); $i++) {
            $product = Product::find($ids[$i]);
            array_push($products, new WishListElement($product));
        }

        return response()->json($products, 200);
    }
}
