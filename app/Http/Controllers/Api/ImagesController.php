<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ImagesProduct;
use Illuminate\Support\Facades\DB;

class ImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('consults');
    }

    public function first($id)
    {
        $image = DB::select('select url from imagesproducts where product_id= ? limit 1', [$id]);
        return response()->json($image, 200);
    }
}
