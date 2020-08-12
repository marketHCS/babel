<?php

namespace App\Http\Controllers\admin;

use App\Buy;
use App\sell;
use App\User;
use App\Ticket;
use App\Address;
use App\Shipment;
use App\BuyDetail;
use App\Inventory;
use App\SellDetail;
use App\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

// use App\User;

// use db;

class SellController extends Controller
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
        return view('admin.sell.index', [
          'sells' =>sell::orderBy('updated_at', 'desc')->paginate()
        ]);
    }

    /**
     * Display the specified resource.
     *
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(sell $sell)
    {
        $details = SellDetail::where('sell_id', '=', $sell->id)->get();
        $buyStatus = DB::select('select * from buystatus where id between 1 and 3', []);
        $status = DB::select('select nameStatus from buystatus where id = ?', [$sell->status_id]);
        $user = User::find($sell->user_id);
        $address = Address::find($sell->address_id);
        $shipment = Shipment::find($sell->shipment_id);
        // dd($sell);
        // dd($shipment);
        return view('admin.sell.show', compact('user', 'address', 'sell', 'details', 'buyStatus', 'status', 'shipment'));
    }

    public function status(Request $request, sell $sell)
    {
        if ($sell->status_id == 4) {
            $details = SellDetail::where('sell_id', '=', $sell->id)->get();

            foreach ($details as $detail) {
                $inventory = Inventory::where('product_id', '=', $detail->product_id)->get();

                $eq_s = $inventory[0]->eq_s - $detail->eq_s;
                $eq_m = $inventory[0]->eq_m - $detail->eq_m;
                $eq_g = $inventory[0]->eq_g - $detail->eq_g;
                $ec_s = $inventory[0]->ec_s - $detail->ec_s;
                $ec_m = $inventory[0]->ec_m - $detail->ec_m;
                $ec_g = $inventory[0]->ec_g - $detail->ec_g;
                $eg_s = $inventory[0]->eg_s - $detail->eg_s;
                $eg_m = $inventory[0]->eg_m - $detail->eg_m;
                $eg_g = $inventory[0]->eg_g - $detail->eg_g;

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

            Ticket::create([
              'url' => route('factures.download', $sell),
              'sell_id' => $sell->id,
              'id' => 'BABEL-00' . $sell->id
            ]);

            $sell->update($request->all());
            return back()->with('status', 'Venta cerrada con éxito.');
        }

        if ($sell->status_id == 1 && $request->status_id == 2) {
            $details = SellDetail::where('sell_id', '=', $sell->id)->get();

            foreach ($details as $detail) {
                $inventory = Inventory::where('product_id', '=', $detail->product_id)->get();

                $eq_s = $inventory[0]->eq_s - $detail->eq_s;
                $eq_m = $inventory[0]->eq_m - $detail->eq_m;
                $eq_g = $inventory[0]->eq_g - $detail->eq_g;
                $ec_s = $inventory[0]->ec_s - $detail->ec_s;
                $ec_m = $inventory[0]->ec_m - $detail->ec_m;
                $ec_g = $inventory[0]->ec_g - $detail->ec_g;
                $eg_s = $inventory[0]->eg_s - $detail->eg_s;
                $eg_m = $inventory[0]->eg_m - $detail->eg_m;
                $eg_g = $inventory[0]->eg_g - $detail->eg_g;

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

            $sell->update($request->all());
            return back()->with('status', 'Venta cerrada con éxito.');
        }


        if ($sell->status_id == 1 && $request->status_id == 3) {
            $sell->update($request->all());
            return back()->with('status', 'Venta cancelada con éxito.');
        }

        if ($request->status_id == 1) {
            return back()->with('status', 'Selecciona otra opción.');
        }

        if ($sell->status_id != 1 && $sell->status_id != 4) {
            return back()->with('status', 'No puedes modificar esta venta.');
        }
    }

    public function shipment(Request $request, sell $sell)
    {
        Shipment::find($sell->shipment_id)->update($request->all());
        return back()->with('status', 'Actualizado con éxito');
    }
}
