<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ImagesProduct;
use Illuminate\Support\Facades\Storage;

class ImagesProductController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('isntDeleted');
    }

    public function destroy(ImagesProduct $imagesProduct)
    {
        // Storage::disk('public/')->delete($imagesProduct->url);
        ImagesProduct::where('id', $imagesProduct->id)->delete();

        return back()->with('status', 'Eliminación exitosa');
    }
}
