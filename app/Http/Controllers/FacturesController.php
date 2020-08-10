<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class FacturesController extends Controller
{
    public function view()
    {
    }

    public function download()
    {
      $pdf = PDF::loadView('');
    }
}
