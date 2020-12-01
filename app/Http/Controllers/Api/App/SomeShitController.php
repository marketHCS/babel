<?php

namespace App\Http\Controllers\Api\App;

use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\WishListElement;

class SomeShitController extends Controller
{
    public function __construct()
    {
        $this->middleware('consults');
    }

    public function lastProducts()
    {
        $lastProducts = DB::select('select * from products order by updated_at desc limit 6', []);
        return response()->json($lastProducts, 200);
    }
}
