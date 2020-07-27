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
      <a href="{{ route('providers.index') }}">Proveedores</a> >
      <a href="{{ route('providers.show', $provider) }}">{{ $provider->nameProvider }}</a>
      <div class="back-link">
        <a href="{{ route('providers.show', $provider) }}" class="btn btn-danger my-3 float-left"><i class="fas fa-backward"></i>
          Regrezar</a>
      </div>
    </div>
  </div>
</div>
<!-- Page info end -->

<div class="container py-5">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Editar proveedor</h5>
      <form action="{{ route('providers.update', compact('provider')) }}" method="post">
        <div class="form-group">
          <div class="form-row">
            <div class="col-4">
              <label for="nameProvider">Nombre: </label>
              <input id="nameProvider" type="text" class="form-control" name="nameProvider" value="{{ old('nameProvider', $provider->nameProvider) }}">
              <small id="nameHelp" class="form-text text-muted">Campo obligatorio.</small>
            </div>
            <div class="col-4">
              <label for="nameProvider">Apellido paterno: </label>
              <input id="nameProvider" class="form-control" type="text" name="apProvider" value="{{ old('apProvider', $provider->apProvider) }}">
            </div>
            <div class="col-4">
              <label for="nameProvider">Apellido materno</label>
              <input id="nameProvider" class="form-control" type="text" name="amProvider" value="{{ old('amProvider', $provider->amProvider) }}">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-6">
              <label for="companyProvider">Compañía:</label>
              <input id="companyProvider" class="form-control" type="text" name="companyProvider" value="{{ old('companyProvider', $provider->companyProvider) }}">
            </div>
            <div class="col-6">
              <label for="rfcProvider">RFC:</label>
              <input id="rfcProvider" class="form-control" type="text" name="rfcProvider" value="{{ old('rfcProvider', $provider->rfcProvider) }}">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-6">
              <label for="emailProvider">Correo electrónico:</label>
              <input id="emailProvider" class="form-control" type="text" name="emailProvider" value="{{ old('emailProvider', $provider->emailProvider) }}">
              <small id="emailHelp" class="form-text text-muted">Campo obligatorio.</small>
            </div>
            <div class="col-6">
              <label for="phone">Número telefónico:</label>
              <input id="phone" class="form-control" type="number" name="phone" value="{{ old('phone', $provider->phone) }}">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <label for="descriptionProvider">Descripción del proveedor: </label>
            <textarea name="descriptionProvider" rows="3" class="form-control">{{ old('descriptionProvider', $provider->descriptionProvider) }}</textarea>
          </div>
        </div>
        @csrf
        @method('put')
        <button type="submit" class="btn btn-primary float-right">Editar</button>
      </form>
    </div>
  </div>
</div>
@endsection
