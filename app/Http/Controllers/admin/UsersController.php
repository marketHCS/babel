<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Address;

class UsersController extends Controller
{
    // use Add
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('isntDeleted');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::orderBy('updated_at', 'desc')->paginate()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $addresses = Address::where('addresses.user_id', '=', $user->id)->get();
        return view('admin.user.show', compact('user', 'addresses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return back()->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, User $user)
    {
        $user->update($request->all());
        return back()->with('status', 'Actualizado con éxito');
    }

    public function admin(Request $request, User $user)
    {
        // dd($request, $user);
        if ($user->typeUser_id == 3) {
            return back()->with('status', 'No puedes modificar a este usuario.');
        } elseif ($user->typeUser_id == 1) {
            $user->update(['typeUser_id' => 2]);
            return back()->with('status', 'Actualizado con éxito.');
        } elseif ($user->typeUser_id == 2) {
            $user->update(['typeUser_id' => 1]);
            return back()->with('status', 'Actualizado con éxito.');
        }
    }
}
