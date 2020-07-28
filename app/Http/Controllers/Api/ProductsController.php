<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class ProductsController extends Controller
{
    public function providers($id)
    {
        // http://127.0.0.1:8000/api/products/provider/1

        $productResult = Product::where('provider_id', '=', $id)->get();
        return response()->json($productResult, 200);
    }
}
