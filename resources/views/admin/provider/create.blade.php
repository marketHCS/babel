@extends('layouts.app')
@section('title', 'Crear proveedor')

@show

@section('content')

<!-- Page info -->
<div class="page-top-info pb-5">
  <div class="container">
    <h4>Crear proveedor:</h4>
    <div class="site-pagination">
      <a href="{{ route('dashboard') }}">Administrador</a> >
      <a href="{{ route('products.index') }}">Proveedores</a>
      <div class="back-link">
        <a href="{{ route('providers.index') }}" class="btn btn-danger my-3 float-left"><i class="fas fa-backward"></i> Regrezar</a>
      </div>
    </div>
  </div>
</div>
<!-- Page info end -->

<div class="container py-5">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Crear nuevo proveedor</h5>
      <form action="{{ route('providers.store') }}" method="post">
        <div class="form-group">
          <div class="form-row">
            <div class="col-4">
              <label for="nameProvider">Nombre: </label>
              <input id="nameProvider" type="text" class="form-control" name="nameProvider">
              <small id="nameHelp" class="form-text text-muted">Campo obligatorio.</small>
            </div>
            <div class="col-4">
              <label for="nameProvider">Apellido paterno: </label>
              <input id="nameProvider" class="form-control" type="text" name="apProvider">
            </div>
            <div class="col-4">
              <label for="nameProvider">Apellido materno</label>
              <input id="nameProvider" class="form-control" type="text" name="amProvider">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-6">
              <label for="companyProvider">Compañía:</label>
              <input id="companyProvider" class="form-control" type="text" name="companyProvider">
            </div>
            <div class="col-6">
              <label for="rfcProvider">RFC:</label>
              <input id="rfcProvider" class="form-control" type="text" name="rfcProvider">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-6">
              <label for="emailProvider">Correo electrónico:</label>
              <input id="emailProvider" class="form-control" type="text" name="emailProvider">
              <small id="emailHelp" class="form-text text-muted">Campo obligatorio.</small>
            </div>
            <div class="col-6">
              <label for="phone">Número telefónico:</label>
              <input id="phone" class="form-control" type="number" name="phone">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <label for="descriptionProvider">Descripción del proveedor: </label>
            <textarea name="descriptionProvider" rows="3" class="form-control"></textarea>
          </div>
        </div>
        @csrf
        <button type="submit" class="btn btn-primary float-right">Crear</button>
      </form>
    </div>
  </div>
</div>
@endsection
