<?php

namespace App\Http\Controllers\Api\App;

use App\WishList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WishListElement;

class WishListController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        $productsOnWishList = $user->wishList()->get();
        $products = [];

        foreach ($productsOnWishList as $wishListElement) {
            $product = $wishListElement->product()->get()[0];
            $product->wishList_id = $wishListElement->id;
            // dd($product);

            array_push($products, new WishListElement($product));
        }

        return response()->json($products, 200);
    }

    public function store($id)
    {
        $user = Auth()->user();

        return response()->json(
            WishList::create([
              "product_id" => $id,
              "user_id" => $user->id
            ]),
            201
        );
    }

    public function destroy(WishList $wishlist)
    {
        $user = Auth()->user();
        $wishlist->delete();

        $list = WishList::where('user_id', '=', $user->id)->get();

        return response()->json($list, 200);
    }
}
