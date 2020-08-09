<?php

namespace App\Http\Controllers\client;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        // dd($user);
        $addresses = Address::where('user_id', '=', $user->id)->get();

        return view('client.profile.show', compact('user', 'addresses'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('client.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        Address::where('user_id', '=', $user->id)->update($request->all());

        return redirect('/profile')->with('status', 'Actualizado con éxito');
    }
}
