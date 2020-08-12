<?php

namespace App\Http\Controllers\backend;

use App\Pay;
use App\sell;
use App\User;
use App\Ticket;
use App\Address;
use App\Product;
use App\Shipment;
use App\Inventory;
use App\SellDetail;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use App\Http\Requests\PayRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isntDeleted');
    }

    // Go to select delivery address
    public function prebilling()
    {
        $cart = Session::get('cart');
        return view('pay.billing', compact('cart'));
    }

    // pass to confirm view, and generate the sell
    public function confirm(PayRequest $request, User $user)
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
            $total += $item['product']->precio_prod * $item['quant'];
        }

        // calc sprite mount
        $totalToSprite = (int) $total * 100;

        // searching a price
        foreach ($arrayOfPrices as $price) {
            // dd($price);
            if ($price->unit_amount == $totalToSprite && $price->product == 'prod_HlqLnwWvYAS8Jz') {
                $priceId = $price;
                break;
            }
        }

        // if !price_id, create a new
        if ($priceId == '') {
            $priceId = $stripe->prices->create([
              'unit_amount' => $totalToSprite,
              'currency' => 'mxn',
              'product' => 'prod_HlqLnwWvYAS8Jz',
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

        Shipment::create([
          'user_id' => Auth::user()->id,
          'address_id' => $address->id
        ]);

        Session::put('sell', $sell);

        Shipment::create(['sell_id' => $sell->id]);

        // create sell details
        foreach ($cart as $item) {
            $inventory = Inventory::find($item['product']->id);
            $productToSell = Product::find($item['product']->id);
            $discount = 0;
            if ($productToSell->descuento != null) {
                $discount = $productToSell->descuento;
            }

            $sellDetail = SellDetail::create([
            'costProduct' => $item['product']->precio_prod,
            'cantidad' => $item['quant'],
            'sell_id' => $sell->id,
            'inventory_id' => $inventory->id,
            'product_id' => $item['product']->id,
            'size' => $item['size'],
            'descuento' => $discount
        ]);
        }

        return view('pay.confirm', compact('cart', 'address', 'sell', 'priceId'));
    }

    // if sell process was successful...??
    public function success()
    {
        $sell = Session::get('sell');
        if ($sell == '') {
            return view('pay.success')->with('status', 'Pago realizado con éxito.');
        }

        // dd($sell);
        $sellDetails = SellDetail::where('sell_id', '=', $sell->id)->get();

        foreach ($sellDetails as $detail) {
            $inventory = Inventory::where('product_id', '=', $detail->product_id)->get();
            // dd($inventory);
            switch ($detail->size) {
                case 1:
                if ($inventory[0]->eq_s > 0) {
                    $inventory[0]->update(['eq_s' => $inventory[0]->eq_s - $detail->cantidad]);
                } elseif ($inventory[0]->ec_s > 0) {
                    $inventory[0]->update(['ec_s' => $inventory[0]->ec_s - $detail->cantidad]);
                } elseif ($inventory[0]->eg_s > 0) {
                    $inventory[0]->update(['eg_s' => $inventory[0]->eg_s - $detail->cantidad]);
                }
            break;
            case 2:
                if ($inventory[0]->eq_m > 0) {
                    $inventory[0]->update(['eq_m' => $inventory[0]->eq_m - $detail->cantidad]);
                } elseif ($inventory[0]->ec_m > 0) {
                    $inventory[0]->update(['ec_m' => $inventory[0]->ec_m - $detail->cantidad]);
                } elseif ($inventory[0]->eg_m > 0) {
                    $inventory[0]->update(['eg_m' => $inventory[0]->eg_m - $detail->cantidad]);
                }
                break;
              case 3:
                if ($inventory[0]->eq_g > 0) {
                    $inventory[0]->update(['eq_g' => $inventory[0]->eq_g - $detail->cantidad]);
                } elseif ($inventory[0]->ec_g > 0) {
                    $inventory[0]->update(['ec_g' => $inventory[0]->ec_g - $detail->cantidad]);
                } elseif ($inventory[0]->eg_g > 0) {
                    $inventory[0]->update(['eg_g' => $inventory[0]->eg_g - $detail->cantidad]);
                }
            break;
            }
        }

        $stripe = new \Stripe\StripeClient('sk_test_51HAW7xJMj1omTiKm6rJsQtHMBWrgLbv8NuGQ6shDFJApN9xhRq8M7B4eITEf2DDMvP1zDcHayjUyX2Mzya1nYrIs00b1hK9hzE');
        $payment = $stripe->paymentIntents->all(['limit' => 1]);

        Pay::create([
          'id' => $payment->data[0]->id,
          'tipo_pago' => $payment->data[0]->payment_method_types[0],
          'receipt_email' => $payment->data[0]->receipt_email,
          'status' => $payment->data[0]->status,
          'amount' => $payment->data[0]->amount,
          'sell_id' => $sell->id,
        ]);

        Ticket::create([
          'id' => $payment->data[0]->charges->data[0]->id,
          'url' => $payment->data[0]->charges->data[0]->receipt_url,
          'sell_id' => $sell->id,
          'customer_stripe_id' => $payment->data[0]->charges->data[0]->customer
        ]);

        Shipment::create([
          'sell_id' => $sell->id,
          'user_id' => $sell->user_id,
          'address_id' => $sell->address_id
        ]);

        Session::put('sell', '');
        Session::put('cart', array());
        if ($sell != '') {
            DB::select('update sells set status_id=1 where id= ? ', [$sell->id]);
        }

        return view('pay.success');
    }

    // if sell process was successful...??
    public function canceled()
    {
        $sell = Session::get('sell');
        Session::put('sell', '');

        if ($sell != '') {
            DB::select('update sells set status_id=3 where id= ? ', [$sell->id]);
        }


        $stripe = new \Stripe\StripeClient('sk_test_51HAW7xJMj1omTiKm6rJsQtHMBWrgLbv8NuGQ6shDFJApN9xhRq8M7B4eITEf2DDMvP1zDcHayjUyX2Mzya1nYrIs00b1hK9hzE');
        $payment = $stripe->paymentIntents->all(['limit' => 1]);

        Pay::create([
          'id' => $payment->data[0]->id,
          'tipo_pago' => $payment->data[0]->payment_method_types[0],
          'receipt_email' => $payment->data[0]->receipt_email,
          'status' => $payment->data[0]->status,
          'amount' => $payment->data[0]->amount,
          'sell_id' => $sell->id,
        ]);

        Ticket::create([
          'id' => $payment->data[0]->id,
          'sell_id' => $sell->id,
        ]);

        return view('pay.canceled');
    }
}
