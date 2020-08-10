<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ImagesProduct;
use App\Category;
use App\Inventory;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isntDeleted');
    }

    public function show(Product $product)
    {
        $images = ImagesProduct::where('imagesproducts.product_id', '=', $product->id)->get();
        $inventory = Inventory::find($product->id);
        $small = ($inventory->eq_s > 0 ||$inventory->eg_s > 0 || $inventory->ec_s > 0) ? true : false;
        $medium = ($inventory->eq_m > 0 ||$inventory->eg_m > 0 || $inventory->ec_m > 0) ? true : false;
        $large = ($inventory->eq_g > 0 ||$inventory->eg_g > 0 || $inventory->ec_g > 0) ? true : false;
        $existence = ($small || $medium || $large) ? true : false;

        $lastProducts = DB::select('select * from products order by updated_at desc limit 6', []);

        return view('client.product.show', compact('product', 'images', 'inventory', 'small', 'medium', 'large', 'existence', 'lastProducts'));
    }

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $inventories = Inventory::all();
        // dd($inventories);
        return view('client.product.index', compact('products', 'categories', 'inventories'));
    }

    public function category($category)
    {
        // dd($category);
        $products = Product::where('category_id', '=', $category)->get();
        $categoryQuery = Category::find($category);
        $categories = Category::all();
        $inventories = Inventory::all();
        // dd($products);
        // dd($categoryQuery);
        return view('client.product.category', compact('products', 'categoryQuery', 'categories', 'inventories'));
    }

    public function boys()
    {
        $products = Product::where('sex_id', '=', 1)->get();
        // dd($products);
        $sex = 'Hombres';
        $inventories = Inventory::all();
        $categories = Category::all();
        return view('client.product.sex', compact('sex', 'categories', 'products', 'inventories'));
    }

    public function girls()
    {
        $products = Product::where('sex_id', '=', 2)->get();
        // dd($products);
        $sex = 'Mujeres';
        $inventories = Inventory::all();
        $categories = Category::all();
        return view('client.product.sex', compact('sex', 'categories', 'products', 'inventories'));
    }
}
