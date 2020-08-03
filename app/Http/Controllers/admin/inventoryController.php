<?php

namespace App\Http\Controllers\admin;

use App\Inventory;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('isntDeleted');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(User $product)
    {
        $inventory = Inventory::where('inventories.product_id', '=', $product->id);
        dd($inventory);
        return view('admin.products.inventory', compact('inventory', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        $inventory->update($request->all());
        return back()->with('status', 'Actualizado con éxito');
    }
}
