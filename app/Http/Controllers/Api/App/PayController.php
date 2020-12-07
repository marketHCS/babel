<?php

namespace App\Http\Controllers\Api\App;

use App\sell;
use App\Address;
use App\Product;
use App\Shipment;
use App\Inventory;
use App\SellDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\WishListElement;

class Data
{
    public $address;
    public $sell;
    public $cart;
}

class PayController extends Controller
{
    public function pay(Request $request)
    {
        $user = Auth()->user();
        $ids = $request->ids;
        $cart = [];

        // dd($ids);


        for ($i = 0; $i < count($ids); $i++) {
            $product = Product::find($ids[$i]);
            array_push($cart, new WishListElement($product));
        }

        // dd($cart);

        // creating stripe instance and variables
        $stripe = new \Stripe\StripeClient(
            'sk_test_51HAW7xJMj1omTiKm6rJsQtHMBWrgLbv8NuGQ6shDFJApN9xhRq8M7B4eITEf2DDMvP1zDcHayjUyX2Mzya1nYrIs00b1hK9hzE'
        );
        $prices = $stripe->prices->all();
        $products = $stripe->products->all();
        $arrayOfPrices = $prices->data;
        $priceId = '';

        $total = 0;
        foreach ($cart as $item) {
            $total += $item->precio_prod;
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

        $shipment = Shipment::create([
          'user_id' => $user->id,
          'address_id' => $address->id
        ]);


        // create sell
        $sell = sell::create([
          'monto_pago' => $total,
          'user_id' => $user->id,
          'address_id' => $address->id,
          'name' => $request->completeName,
          'phone' => $request->phone,
          'shipment_id' => $shipment->id
        ]);

        // create sell details
        foreach ($cart as $item) {
            $inventory = Inventory::find($item->id);
            $productToSell = Product::find($item->id);
            $discount = 0;
            if ($productToSell->descuento != null) {
                $discount = $productToSell->descuento;
            }

            $sellDetail = SellDetail::create([
            'costProduct' => $item->precio_prod,
            'cantidad' => 1,
            'sell_id' => $sell->id,
            'inventory_id' => $inventory->id,
            'product_id' => $item->id,
            'size' => 2,
            'descuento' => $discount
        ]);
        }

        // // 'cart', 'address', 'sell', 'priceId'

        $data = new Data();
        $data->cart = $cart;
        $data->total = $total;
        $data->address = $address;
        $data->sell = $sell;
        // $data->priceId = $priceId->id;

        return response()->json($data, 200);
        // return response()->json("aca", 200);
    }
}
