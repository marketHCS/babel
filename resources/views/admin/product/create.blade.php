@extends('layouts.app')
@section('title', 'Crear proveedor')

@show

@section('content')

<!-- Page info -->
<div class="page-top-info pb-5">
  <div class="container">
    <h4>Crear producto:</h4>
    <div class="site-pagination">
      <a href="{{ route('dashboard') }}">Administrador</a> >
      <a href="{{ route('products.index') }}">Productos</a>
      <div class="back-link">
        <a href="{{ route('products.index') }}" class="btn btn-danger my-3 float-left"><i class="fas fa-backward"></i> Regrezar</a>
      </div>
    </div>
  </div>
</div>
<!-- Page info end -->

<div class="container py-5">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Crear nuevo producto</h5>
      <form action="{{ route('products.store') }}" method="post">
        <div class="form-group" id="basics">
          <div class="form-row">
            <div class="col-6">
              <label for="nameProduct">Nombre del producto: </label>
              <input type="text" class="form-control" name="nameProduct" id="nameProduct" value="">
            </div>
            <div class="col-6">
              @php
              $queryProvider = DB::select('select * from providers', []);
              // dd($queryProvider);
              @endphp
              <label for="provider_id">Proveedor: </label>
              <select name="provider_id" id="provider_id" class="form-control custom-select" value="">
                @foreach ($queryProvider as $provider)
                <option value="{{ $provider->id }}">{{ $provider->nameProvider }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="form-group" id="status">
          <div class="form-row">
            <div class="col-4">
              @php
              $queryStatus = DB::select('select * from statusproducts', []);
              // dd($queryStatus);
              @endphp
              <label for="statusProduct_id">Estado del producto: </label>
              <select class="form-control custom-select" name="statusProduct_id" id="statusProduct_id" value="">
                @foreach ($queryStatus as $status)
                <option value="{{ $status->id }}">{{ $status->nameStatus }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-4">
              <label for="costo_prod">Costo del producto: </label>
              <input type="number" class="form-control" name="costo_prod" value="">
            </div>
            <div class="col-4">
              <label for="precio_prod">Precio del producto: </label>
              <input type="number" class="form-control" name="precio_prod" value="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col">
              <label for="description_prod">Descripción del producto: </label>
              <textarea name="description_prod" rows="3" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-4">
              <label for="descuento">Descuento: </label>
              <input type="number" class="form-control" step="any" name="descuento" id="descuento" value="">
              <small id="descuentoHelp" class="form-text text-muted">En valor decimal.</small>
            </div>
            <div class="col-4">
              <label for="material_prod">Material del producto: </label>
              <input type="text" class="form-control" name="material_prod" value="">
            </div>
            <div class="col-4">
              @php
              $queryCategorie = DB::select('select * from categories', []);
              // dd($queryCategorie);
              @endphp
              <label for="category_id">Categoría del producto: </label>
              <select name="category_id" id="category_id" class="form-control custom-select">
                @foreach ($queryCategorie as $category)
                <option value="{{ $category->id }}">{{ $category->nameCategory }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          @csrf
          <button type="submit" class="btn btn-success float-right">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
