<?php

namespace App\Http\Controllers\Api\App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BrowserController extends Controller
{
    public function browser(Request $request)
    {
        if (isset($request->search)) {
            $products = DB::select('select * from products where nameProduct like "%' . $request->search . '%"', []);
            dd($products);

            return response()->json($products, 200);
        } else {
            return response()->json(404);
        }
    }
}
