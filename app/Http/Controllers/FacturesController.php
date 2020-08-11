<?php

namespace App\Http\Controllers;

use App\sell;
use App\User;
use App\Ticket;
use App\SellDetail;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class FacturesController extends Controller
{
    public function view(sell $sell)
    {
        $user = User::find($sell->user_id);
        $details = SellDetail::where('sell_id', '=', $sell->id)->get();
        // $ticket = Ticket::where('sell_id', '=', $sell->id)->get()[0];
        // dd($details);
        return view('factures', compact('sell', 'user', 'details'));
    }

    public function download(sell $sell)
    {
        $user = User::find($sell->user_id);
        $details = SellDetail::where('sell_id', '=', $sell->id)->get();

        // $pdf = app('dompdf.wrapper');
        // $pdf = \PDF::loadView('factures', compact('sell', 'user', 'details'));

        // dd($pdf);
        // $pdf = \PDF::loadHtml('<h1>Hola</h1>');
        return $pdf = \PDF::loadView('factures', compact('sell', 'user', 'details'))->stream();
    }
}
