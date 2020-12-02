<?php

namespace App\Http\Controllers\client;

use App\Product;
use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WishListController extends Controller
{
    public function index()
    {
        $lastProducts = DB::select('select * from products order by updated_at desc limit 6', []);
        // $products = WishList::where('user_id', '=', Auth()->user()->id)->get();

        // dd($products);

        return view('client.wishlist.index', \compact('lastProducts'));
    }

    public function destroy(WishList $wishlist)
    {
        $wishlist->delete();

        return back()->with('status', 'Eliminado correctamente de la wishList');
    }

    public function store(Product $product)
    {
        $user = Auth()->user();

        WishList::create([
        'user_id' => $user->id,
        'product_id' => $product->id
      ]);

        return back()->with('status', 'Agregado correctamente a la wishList');
    }
}
