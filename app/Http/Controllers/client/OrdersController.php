<?php

namespace App\Http\Controllers\client;

use App\sell;
use App\Address;
use App\Shipment;
use App\SellDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isntDeleted');
    }

    public function index()
    {
        $orders = sell::where('user_id', '=', Auth::user()->id)->paginate();
        return view('client.orders.index', compact('orders'));
    }

    public function show(sell $sell)
    {
        $user = Auth::user();
        $address = Address::find($sell->address_id);
        $shipment = Shipment::where('sell_id', '=', $sell->id)->get()[0];
        $details = SellDetail:: where('sell_id', '=', $sell->id)->get();
        $status = DB::select('select * from buyStatus where id = ?', [$sell->status_id])[0];

        return view('client.orders.show', compact('user', 'sell', 'address', 'shipment', 'status', 'details'));
    }
}
