<?php

namespace App\Http\Controllers\backend;

use App\sell;
use App\User;
use App\Address;
use App\Inventory;
use App\SellDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Stripe\StripeClient;

class PayController extends Controller
{
    public function prebilling()
    {
        $cart = Session::get('cart');
        return view('pay.billing', compact('cart'));
    }

    public function confirm(Request $request, User $user)
    {
        // creating stripe instance and variables
        $stripe = new \Stripe\StripeClient(
            'sk_test_51HAW7xJMj1omTiKm6rJsQtHMBWrgLbv8NuGQ6shDFJApN9xhRq8M7B4eITEf2DDMvP1zDcHayjUyX2Mzya1nYrIs00b1hK9hzE'
        );
        $prices = $stripe->prices->all();
        $products = $stripe->products->all();
        $arrayOfPrices = $prices->data;
        $priceId = '';

        // calc total variable
        $cart = Session::get('cart');
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['product']->precio_prod;
        }

        // calc sprite mount
        $totalToSprite = (int) $total * 100;

        // searching a price
        foreach ($arrayOfPrices as $price) {
            // dd($price);
            if ($price->unit_amount == $totalToSprite) {
                $priceId = $price;
                break;
            }
        }

        // if !price_id, create a new
        if ($priceId == '') {
            $priceId = $stripe->prices->create([
              'unit_amount' => $totalToSprite,
              'currency' => 'mxn',
              'product' => 'prod_HlMhFZ1SEshtj8',
            ]);
        }

        // create address
        $address = Address::create([
          'street' => $request->street,
          'exteriorNumberAddress' => $request->exteriorNumberAddress,
          'interiorNumberAddress'=> $request->interiorNumberAddress,
          'suburb' => $request->suburb,
          'city' => $request->city,
          'estate' => $request->estate,
          'cp' => $request->cp,
          'user_id' => $user->id,
        ]);

        // setting phone number
        DB::select('update users set phone= ? where id= ?', [$request->phone, $user->id]);

        // create sell
        $sell = sell::create([
          'monto_pago' => $total,
          'user_id' => $user->id,
          'address_id' => $address->id,
          'name' => $request->completeName,
          'phone' => $request->phone,
        ]);

        // create sell details
        foreach ($cart as $item) {
            $inventory = Inventory::find($item['product']->id);
            $sellDetail = SellDetail::create([
            'costProduct' => $item['product']->precio_prod,
            'cantidad' => $item['quant'],
            'sell_id' => $sell->id,
            'inventory_id' => $inventory->id,
            'product_id' => $item['product']->id,
            'size' => $item['size']
        ]);
        }

        Session::put('sell', $sell);

        return view('pay.confirm', compact('cart', 'address', 'sell', 'priceId'));
    }

    public function success()
    {
        $sell = Session::get('sell');
        Session::put('sell', '');
        Session::put('cart', array());
        if ($sell != '') {
            DB::select('update sells set status_id=1 where id= ? ', [$sell->id]);
        }

        return view('pay.success');
    }

    public function canceled()
    {
        $sell = Session::get('sell');
        Session::put('sell', '');

        if ($sell != '') {
            DB::select('update sells set status_id=3 where id= ? ', [$sell->id]);
        }

        return view('pay.canceled');
    }
}
