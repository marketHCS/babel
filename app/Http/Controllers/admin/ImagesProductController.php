<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ImagesProduct;
use App\Product;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImageRequest;

class ImagesProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('isntDeleted');
    }

    public function store(ImageRequest $request, Product $product)
    {//salvar
        $image = ImagesProduct::create($request->all());
        $image->product_id = $product->id;

        //imagen

        $file = $request->url;
        $file->move(public_path('products', $file), $file->getClientOriginalName());
        $image->url = 'products/' . $file->getClientOriginalName();

        // $image->url = $request->url->store('products', 'public');
        $image->save();

        //retornar
        return back()->with('status', 'Creado con éxito');
    }

    public function destroy($id)
    {
        // dd($id);
        $image = ImagesProduct::find($id);
        // dd($image);

        Storage::disk('public')->delete($image->url);
        $image->delete();

        return back()->with('status', 'Eliminación exitosa');
    }
}
