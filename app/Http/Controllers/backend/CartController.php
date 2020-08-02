<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Inventory;

class CartController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('isntDeleted');
        if (!Session::has('cart')) {
            Session::put('cart', array());
        }
    }

    public function index()
    {
        $cart = Session::get('cart');
        $lastProducts = DB::select('select * from products order by updated_at desc limit 6', []);
        return view('client.cart.index', compact('lastProducts', 'cart'));
    }

    public function store(Request $request, $id)
    {
        // dd($request);
        $cart = Session::get('cart');
        $product = Product::find($id);
        $anArray = array( 'product' => $product,
                          'quant' => $request->quant,
                          'size' => (int) $request->size);
        // dd($anArray);
        $cart[] = $anArray;
        Session::put('cart', $cart);
        return back()->with('status', 'Producto añadido al carrito.');
    }

    public function reset()
    {
        $cart = array();
        Session::put('cart', $cart);
        return back()->with('status', 'Carrito vaciado.');
    }

    public function destroy($index)
    {
        $cart = Session::get('cart');
        unset($cart[$index]);
        Session::put('cart', $cart);

        return back()->with('status', 'Producto eliminado.');
    }
}
