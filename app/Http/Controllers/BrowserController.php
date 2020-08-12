<?php

namespace App\Http\Controllers;

use App\Category;
use App\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrowserController extends Controller
{
    public function browser(Request $request)
    {
        // dd($request);
        $products = DB::select('select * from products where nameProduct like "%' . $request->toSearch . '%"', []);
        // dd($response);

        // $categoryQuery = Category::find($category);
        $categories = Category::all();
        $inventories = Inventory::all();


        return view('browse', compact('products', 'request', 'inventories', 'categories'));
    }
}
