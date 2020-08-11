<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('consults');
    }

    public function providers($id)
    {
        // http://127.0.0.1:8000/api/products/provider/1

        $productResult = Product::where('provider_id', '=', $id)->get();
        return response()->json($productResult, 200);
    }

    public function products()
    {
        $productResult = Product::orderBy('updated_at', 'desc')->get();
        return response()->json($productResult, 200);
    }

    public function existence()
    {
        $existences = DB::select('select nameProduct, ec_g + ec_m + ec_s + eg_g + eg_m + eg_s + eq_g + eq_m + eq_s as "exístencia total" from inventories join products p on p.id = inventories.product_id', []);
        return response()->json($existences, 200);
    }
}
