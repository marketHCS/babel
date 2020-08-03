@extends('layouts.app')
@section('title', 'Crear categoría')

@show

@section('content')

<!-- Page info -->
<div class="page-top-info pb-5">
  <div class="container">
    <h4>Editar categoría:</h4>
    <div class="site-pagination">
      <a href="{{ route('dashboard') }}">Administrador</a> >
      <a href="{{ route('categories.index') }}">Categoría</a>
      <div class="back-link">
        <a href="{{ route('categories.index') }}" class="btn btn-danger my-3 float-left"><i class="fas fa-backward"></i>
          Regresar
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Page info end -->

<div class="container py-5">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Editar categoría</h5>
      <form action="{{ route('categories.update', compact('category')) }}" method="post">
        <div class="form-group">
          <div class="form-row">
            <label for="namecategory">Nombre: </label>
            <input id="namecategory" type="text" class="form-control" name="nameCategory" value="{{ old('nameCategory', $category->nameCategory) }}">
            <small id="nameHelp" class="form-text text-muted">Campo obligatorio.</small>
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
