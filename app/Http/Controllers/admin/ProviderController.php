<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProviderRequest;
use App\Provider;

class ProviderController extends Controller
{
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
        return view('admin.provider.index', [
            'providers' => Provider::orderBy('updated_at', 'desc')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderRequest $request)
    {
        $provider = Provider::create($request->all());
        return redirect('admin/providers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view('admin.provider.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('admin.provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        // dd($provider);
        // dd($request);
        $provider->update($request->all());
        return back()->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function delete(Provider $provider)
    {
        if ($provider->status) {
            $provider->update(['status'=>0]);
        } else {
            $provider->update(['status'=>1]);
        }
        return back()->with('status', 'Actualizado con éxito');
    }
}
