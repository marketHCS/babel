<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Buy;
use App\Administrator;
use App\BuyDetail;
use App\Inventory;

// use App\User;

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
        // dd($request);
        $admin = Administrator::where('user_id', '=', $request->user_id)->get();
        $buy = Buy::create([
          'administrator_id' => $admin[0]->id,
          'provider_id' => $request->provider_id,
          'concepto_compra' => $request->concepto_compra
        ]);

        $tot = $request->eq_s1 + $request->eq_m1 + $request->eq_g1 + $request->ec_s1 + $request->ec_m1 + $request->ec_g1 + $request->eg_s1 + $request->eg_m1 + $request->eg_g1;

        $buyDetail1 = BuyDetail::create([
        'cantidad_com' => $tot,
        'buy_id' => $buy->id,
        'product_id' => $request->productSelect1,
        'eq_s'=> $request->eq_s1,
        'eq_m'=> $request->eq_m1,
        'eq_g'=> $request->eq_g1,
        'ec_s'=> $request->ec_s1,
        'ec_m'=> $request->ec_m1,
        'ec_g'=> $request->ec_g1,
        'eg_s'=> $request->eg_s1,
        'eg_m'=> $request->eg_m1,
        'eg_g'=> $request->eg_g1
        ]);

        if ($request->count > 1) {
            $tot2 = $request->eq_s2 + $request->eq_m2 + $request->eq_g2 + $request->ec_s2 + $request->ec_m2 + $request->ec_g2 + $request->eg_s2 + $request->eg_m2 + $request->eg_g2;

            $buyDetail2 = BuyDetail::create([
              'cantidad_com' => $tot2,
              'buy_id' => $buy->id,
              'product_id' => $request->productSelect2,
              'eq_s'=> $request->eq_s2,
              'eq_m'=> $request->eq_m2,
              'eq_g'=> $request->eq_g2,
              'ec_s'=> $request->ec_s2,
              'ec_m'=> $request->ec_m2,
              'ec_g'=> $request->ec_g2,
              'eg_s'=> $request->eg_s2,
              'eg_m'=> $request->eg_m2,
              'eg_g'=> $request->eg_g2,
            ]);
        }

        if ($request->count > 2) {
            $tot3 = $request->eq_s3 + $request->eq_m3 + $request->eq_g3 + $request->ec_s3 + $request->ec_m3 + $request->ec_g3 + $request->eg_s3 + $request->eg_m3 + $request->eg_g3;

            $buyDetail3 = BuyDetail::create([
              'cantidad_com' => $tot3,
              'buy_id' => $buy->id,
              'product_id' => $request->productSelect3,
              'eq_s'=> $request->eq_s3,
              'eq_m'=> $request->eq_m3,
              'eq_g'=> $request->eq_g3,
              'ec_s'=> $request->ec_s3,
              'ec_m'=> $request->ec_m3,
              'ec_g'=> $request->ec_g3,
              'eg_s'=> $request->eg_s3,
              'eg_m'=> $request->eg_m3,
              'eg_g'=> $request->eg_g3,
            ]);
        }

        if ($request->count > 3) {
            $tot4 = $request->eq_s4 + $request->eq_m4 + $request->eq_g4 + $request->ec_s4 + $request->ec_m4 + $request->ec_g4 + $request->eg_s4 + $request->eg_m4 + $request->eg_g4;

            $buyDetail4 = BuyDetail::create([
              'cantidad_com' => $tot4,
              'buy_id' => $buy->id,
              'product_id' => $request->productSelect4,
              'eq_s'=> $request->eq_s4,
              'eq_m'=> $request->eq_m4,
              'eq_g'=> $request->eq_g4,
              'ec_s'=> $request->ec_s4,
              'ec_m'=> $request->ec_m4,
              'ec_g'=> $request->ec_g4,
              'eg_s'=> $request->eg_s4,
              'eg_m'=> $request->eg_m4,
              'eg_g'=> $request->eg_g4,
            ]);
        }

        if ($request->count > 4) {
            $tot5 = $request->eq_s5 + $request->eq_m5 + $request->eq_g5 + $request->ec_s5 + $request->ec_m5 + $request->ec_g5 + $request->eg_s5 + $request->eg_m5 + $request->eg_g5;

            $buyDetail5 = BuyDetail::create([
              'cantidad_com' => $tot5,
              'buy_id' => $buy->id,
              'product_id' => $request->productSelect5,
              'eq_s'=> $request->eq_s5,
              'eq_m'=> $request->eq_m5,
              'eq_g'=> $request->eq_g5,
              'ec_s'=> $request->ec_s5,
              'ec_m'=> $request->ec_m5,
              'ec_g'=> $request->ec_g5,
              'eg_s'=> $request->eg_s5,
              'eg_m'=> $request->eg_m5,
              'eg_g'=> $request->eg_g5,
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
    public function show(Buy $buy)
    {
        $details = BuyDetail::where('buy_id', '=', $buy->id)->get();
        $provider = DB::select('select * from providers where id= ?', [$buy->provider_id]);
        $buyStatus = DB::select('select * from buystatus', []);
        $status = DB::select('select nameStatus from buystatus where id = ?', [$buy->status_id]);
        // $products = DB::select('select * from products where provider_id = ? ', [$buy->product_id]);
        $userXadmin = DB::select('select * from users join administrators a on users.id = a.user_id where a.id = ?', [$buy->administrator_id]);
        return view('admin.buy.show', compact('buy', 'details', 'userXadmin', 'provider', 'buyStatus', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.buy.edit');
    }

    public function status(Request $request, Buy $buy)
    {
        if ($buy->status_id == 1 && $request->status_id == 2) {
            $details = BuyDetail::where('buy_id', '=', $buy->id)->get();

            foreach ($details as $detail) {
                $inventory = Inventory::where('product_id', '=', $detail->product_id)->get();

                // dd($inventory);
                $eq_s = $detail->eq_s + $inventory[0]->eq_s;
                $eq_m = $detail->eq_m + $inventory[0]->eq_m;
                $eq_g = $detail->eq_g + $inventory[0]->eq_g;
                $ec_s = $detail->ec_s + $inventory[0]->ec_s;
                $ec_m = $detail->ec_m + $inventory[0]->ec_m;
                $ec_g = $detail->ec_g + $inventory[0]->ec_g;
                $eg_s = $detail->eg_s + $inventory[0]->eg_s;
                $eg_m = $detail->eg_m + $inventory[0]->eg_m;
                $eg_g = $detail->eg_g + $inventory[0]->eg_g;

                $inventory[0]->update([
                  'eq_s' => $eq_s,
                  'eq_m' => $eq_m,
                  'eq_g' => $eq_g,
                  'ec_s' => $ec_s,
                  'ec_m' => $ec_m,
                  'ec_g' => $ec_g,
                  'eg_s' => $eg_s,
                  'eg_m' => $eg_m,
                  'eg_g' => $eg_g,
                ]);
                // dd($inventory);
            }

            $buy->update($request->all());
            return back()->with('status', 'Compra cerrada con éxito.');
        }

        if ($buy->status_id == 1 && $request->status_id == 3) {
            $buy->update($request->all());
            return back()->with('status', 'Compra cancelada con éxito.');
        }

        if ($request->status_id == 1) {
            return back()->with('status', 'Selecciona otra opción.');
        }

        if ($buy->status_id != 1) {
            return back()->with('status', 'No puedes modificar esta compra.');
        }
    }
}
