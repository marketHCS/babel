<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Buy;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

// use db;

class BuyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('isntDeleted');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.buy.index', [
          'buys' =>Buy::orderBy('updated_at', 'desc')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // dd($product);
        // $images = ImagesProduct::where('imagesproducts.product_id', '=', $product->id)->get();
        // dd($images);
        return view('admin.product.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.product.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request)
    {
        if ($request->costo_prod > $request->precio_prod) {
            // return back()->with('status', 'No puedes vender a perdida.');
        } else {
            // $product->update($request->all());
            return back()->with('status', 'Actualizado con éxito');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function delete(Request $request)
    {
        // dd($product);
        // if ($product->statusProduct_id != 5) {
            // Product::where('id', $product->id)->update(['statusProduct_id'=>5]);
        // dd($request);
            // $product->statusProduct_id = 5;
            // $product->save();
        // } else {
            // Product::where('id', $product->id)->update(['statusProduct_id'=>2]);
        // }
        // return back()->with('status', 'Actualizado con éxito');
    }
}
