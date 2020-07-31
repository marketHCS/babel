<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Product;
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
}
