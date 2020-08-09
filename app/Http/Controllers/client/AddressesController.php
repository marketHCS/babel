<?php

namespace App\Http\Controllers\client;

use App\User;
use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressRequest;

class AddressesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isntDeleted');
    }


    public function edit()
    {
        $address = Address::where('user_id', '=', Auth::user()->id)->get()[0];
        $user = Auth::user();
        // dd($address);
        return view('client.addresses.edit', compact('address', 'user'));
    }

    public function update(AddressRequest $request, Address $address)
    {
        $address->update($request->all());
        return back()->with('status', 'Actualizado con éxito');
    }

    // public function destroy(Address $address)
    // {
    //     $address->delete();
    //     return back()->with('status', 'Eliminación exitosa');
    // }
}
