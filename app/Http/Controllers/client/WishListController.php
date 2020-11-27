<?php

namespace App\Http\Controllers\client;

use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WishListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isntDeleted');
    }

    public function index()
    {
        $lastProducts = DB::select('select * from products order by updated_at desc limit 6', []);
        $products = WishList::where('user_id', '=', Auth()->user()->id)->get();

        // dd($products);

        return view('client.wishlist.index', \compact('products', 'lastProducts'));
    }

    public function destroy(WishList $wishlist)
    {
        $wishlist->delete();

        return back()->with('message', 'Eliminado correctamente de la wishList');
    }
}
