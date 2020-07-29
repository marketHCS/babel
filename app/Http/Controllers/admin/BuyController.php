<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Buy;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Administrator;
// use App\User;
use App\BuyDetail;

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
        $admin = Administrator::where('user_id', '=', $request->user_id)->get();
        $buy = Buy::create([
          'administrator_id' => $admin[0]->id,
          'provider_id' => $request->provider_id,
          'concepto_compra' => $request->concepto_compra
        ]);

        $buyDetail = BuyDetail::create([
        'cantidad_com' => $request->quant1,
        'buy_id' => $buy->id,
        'product_id' => $request->productSelect1,
        ]);

        if ($request->count > 1) {
            $buyDetail2 = BuyDetail::create([
              'cantidad_com' => $request->quant2,
              'buy_id' => $buy->id,
              'product_id' => $request->productSelect2
            ]);
        }

        if ($request->count > 2) {
            $buyDetail3 = BuyDetail::create([
              'cantidad_com' => $request->quant3,
              'buy_id' => $buy->id,
              'product_id' => $request->productSelect3
            ]);
        }

        if ($request->count > 3) {
            $buyDetail4 = BuyDetail::create([
              'cantidad_com' => $request->quant4,
              'buy_id' => $buy->id,
              'product_id' => $request->productSelect4
            ]);
        }

        if ($request->count > 4) {
            $buyDetail5 = BuyDetail::create([
              'cantidad_com' => $request->quant5,
              'buy_id' => $buy->id,
              'product_id' => $request->productSelect5
            ]);
        }

        if ($request->count > 5) {
            $buyDetail6 = BuyDetail::create([
              'cantidad_com' => $request->quant6,
              'buy_id' => $buy->id,
              'product_id' => $request->productSelect6
            ]);
        }

        if ($request->count > 6) {
            $buyDetail7 = BuyDetail::create([
              'cantidad_com' => $request->quant7,
              'buy_id' => $buy->id,
              'product_id' => $request->productSelect7
            ]);
        }

        if ($request->count > 7) {
            $buyDetail8 = BuyDetail::create([
              'cantidad_com' => $request->quant8,
              'buy_id' => $buy->id,
              'product_id' => $request->productSelect8
            ]);
        }

        if ($request->count > 8) {
            $buyDetail9 = BuyDetail::create([
              'cantidad_com' => $request->quant9,
              'buy_id' => $buy->id,
              'product_id' => $request->productSelect9
            ]);
        }

        if ($request->count > 9) {
            $buyDetail10 = BuyDetail::create([
              'cantidad_com' => $request->quant10,
              'buy_id' => $buy->id,
              'product_id' => $request->productSelect10
            ]);
        }


        return back()->with('status', 'Agregado con éxito');
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
