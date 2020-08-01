<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lastProducts = DB::select('select * from products order by updated_at desc limit 6', []);
        return view('home', compact('lastProducts'));
    }
}
