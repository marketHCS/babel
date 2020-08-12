<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('isntDeleted');
    }

    public function index()
    {
        $existences = DB::select('select nameProduct, ec_g + ec_m + ec_s + eg_g + eg_m + eg_s + eq_g + eq_m + eq_s as "existencia_total" from inventories join products p on p.id = inventories.product_id', []);
        $sells = DB::select('select nameProduct, sum(cantidad) "cantidad" from selldetails join products p on p.id = selldetails.product_id where status_id=2 group by product_id', []);
        $totals = DB::select('select nameProduct,  sum( cantidad * costo_prod - cantidad * costo_prod * selldetails.descuento ) "total" from selldetails join products p on p.id = selldetails.product_id where status_id=2 group by product_id', []);
        return view('admin.dashboard', compact('existences', 'sells', 'totals'));
    }
}
