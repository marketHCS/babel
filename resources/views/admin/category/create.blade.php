@extends('layouts.app')
@section('title', 'Crear categoría')

@show

@section('content')

<!-- Page info -->
<div class="page-top-info pb-5">
  <div class="container">
    <h4>Crear categoría:</h4>
    <div class="site-pagination">
      <a href="{{ route('dashboard') }}">Administrador</a> >
      <a href="{{ route('categories.index') }}">Categorías</a>
      <div class="back-link">
        <a href="{{ route('categories.index') }}" class="btn btn-danger my-3 float-left"><i class="fas fa-backward"></i> Regrezar</a>
      </div>
    </div>
  </div>
</div>
<!-- Page info end -->

<div class="container py-5">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Crear nueva categoría</h5>
      <form action="{{ route('providers.store') }}" method="post">
        <div class="form-group">
          <div class="form-row">
            <label for="nameCategory">Nombre: </label>
            <input id="nameCategory" type="text" class="form-control" name="nameCategory">
            <small id="nameHelp" class="form-text text-muted">Campo obligatorio.</small>
          </div>
        </div>
        @csrf
        <button type="submit" class="btn btn-primary float-right">Crear</button>
      </form>
    </div>
  </div>
</div>
@endsection
