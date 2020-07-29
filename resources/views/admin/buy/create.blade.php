@extends('layouts.app')
@section('title', 'Nueva compra')

@section('content')

<!-- Page info -->
<div class="page-top-info pb-5">
  <div class="container">
    <h4>Crear compra:</h4>
    <div class="site-pagination">
      <a href="{{ route('dashboard') }}">Administrador</a> >
      <a href="{{ route('products.index') }}">Compras</a>
      <div class="back-link">
        <a href="{{ route('buys.index') }}" class="btn btn-danger my-3 float-left"><i class="fas fa-backward"></i> Regrezar</a>
      </div>
    </div>
  </div>
</div>
<!-- Page info end -->

<div class="container py-5">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Crear nueva compra</h5>
      <form action="{{ route('buys.store') }}" method="post">
        <div class="form-group" id="basics">
          <div class="form-row">
            <div class="col-6">
              <label for="nameAdmin">Nombre del administrador: </label>
              <input type="text" class="form-control" id="nameAdmin" value="{{ Auth::user()->name }}" disabled>
            </div>
            <div class="col-6">
              @php
              $queryProvider = DB::select('select * from providers', []);
              // dd($queryProvider);
              @endphp
              <label for="provider_id">Proveedor: </label>
              <select name="provider_id" id="provider_id" class="form-control custom-select" value="">
                <option value="0">Seleccionar</option>
                @foreach ($queryProvider as $provider)
                <option value="{{ $provider->id }}">{{ $provider->nameProvider }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col">
              <label for="concepto_compra">Concepto de la compra: </label>
              <textarea name="concepto_compra" id="concepto_compra" rows="3" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <button type="button" class="btn btn-success float-right hidden" id="addProduct">Agregar producto</button>
            </div>
          </div>
        </div>
        <div id="products">
        </div>
        <div class="container-fluid mt-1">
          <input type="number" class="hiddenO" id="count" name="count">
          @csrf
          <button type="submit" class="btn btn-success float-right hiddenO" id="submit">Crear compra</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="{{ asset('js/addProduct.js') }}"></script>
@endsection
