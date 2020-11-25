<?php

namespace App\Http\Controllers\Api\App;

use Illuminate\Http\Request;
use App\Http\Resources\ListProduct;
use App\Http\Controllers\Controller;

class WishListController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        $productsOnWishList = $user->wishList()->get();
        $products = [];

        foreach ($productsOnWishList as $wishListElement) {
            array_push($products, new ListProduct($wishListElement->product()->get()[0]));
        }

        return response()->json($products, 200);
    }
}
