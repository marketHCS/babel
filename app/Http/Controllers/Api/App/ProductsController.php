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

    public function providers($id)
    {
        $productResult = Product::where('provider_id', '=', $id)->get();
        return response()->json($productResult, 200);
    }

    public function products()
    {
        $productsQuery = Product::orderBy('updated_at', 'desc')->get();
        $products = [];

        foreach ($productsQuery as $product) {
            array_push($products, new FullProduct($product));
        }

        return response()->json($products, 200);
    }

    public function existence()
    {
        $existences = DB::select('select nameProduct, ec_g + ec_m + ec_s + eg_g + eg_m + eg_s + eq_g + eq_m + eq_s as "exístencia total" from inventories join products p on p.id = inventories.product_id', []);
        return response()->json($existences, 200);
    }
}
