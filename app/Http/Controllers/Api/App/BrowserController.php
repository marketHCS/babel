<?php

namespace App\Http\Controllers\Api\App;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ListProduct;
use App\Http\Controllers\Controller;

class BrowserController extends Controller
{
    public function browser(Request $request)
    {
        if (isset($request->search)) {
            $statement = '%' . $request->search . '%';
            $productsQuery = Product::where('nameProduct', 'like', $statement)->get();
            // dd($products);

            $products = [];

            foreach ($productsQuery as $product) {
                array_push($products, new ListProduct($product));
            }

            return response()->json($products, 200);
        } else {
            return response()->json(404);
        }
    }
}
