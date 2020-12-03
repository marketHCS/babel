<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticController extends Controller
{
    public function support()
    {
        $lastProducts = DB::select('select * from products order by updated_at desc limit 6', []);

        return view('support', compact('lastProducts'));
    }

    public function about()
    {
        $lastProducts = DB::select('select * from products order by updated_at desc limit 6', []);
        return view('about', compact('lastProducts'));
    }

    public function shipping()
    {
        $lastProducts = DB::select('select * from products order by updated_at desc limit 6', []);
        return view('shipping', compact('lastProducts'));
    }

    public function loginWeb()
    {
        return view('auth.loginWeb');
    }
}
