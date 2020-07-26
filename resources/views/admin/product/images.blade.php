@extends('layouts.app')
@section('title', 'Editar imagenes')

{{-- @php
dd($images);
@endphp --}}

@section('content')
<!-- section -->
<div class="page-top-info">
  <div class="container">
    <h4>Editar producto</h4>
    <div class="site-pagination">
      <a href="{{ route('dashboard') }}">Administrador</a> >
      <a href="{{ route('products.index') }}">Producto</a> >
      <a href="{{ route('products.show', $product) }}">{{ $product->nameProduct }}</a> >
      <a href="{{ route('products.images', $product) }}">Imagenes</a> >
      <a href="{{ route('products.images', $product) }}">#{{ $product->id }}</a>
      <div class="back-link">
        <a href="{{ route('products.show', $product) }}" class="btn btn-danger my-3 float-left"><i class="fas fa-backward"></i> Regrezar</a>
        <button type="button" class="btn btn-success my-3 float-right" data-toggle="modal" data-target="#addImage"><i class="far fa-file-image mr-1"></i> Añadir imagen</button>
      </div>
    </div>
  </div>
</div>
<section class="product-section">
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <table class="table">
            <thead class="thead-dark">
              <th scope="col">#</th>
              <th scope="col">Imagen</th>
              <th scope="col">&nbsp;</th>
            </thead>
            <tbody>
              @foreach ($images as $image)
              <tr>
                <td>{{ $image->id }}</td>
                <td><img src="{{ $image->get_image }}" alt="Imagen no disponible, recomendado borrarla" class="thumb-destroy rounded"></td>
                <td>
                  <form action="{{ route('products.destroyImage', $image->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-sm btn-danger" value="Eliminar">
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- section -->

<!-- Modal-->
<div class="modal fade" id="addImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('products.storeImage', $product) }}" enctype="multipart/form-data" method="POST">
        <div class="modal-body">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Imagen</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="url" accept="image/*">
              <label class="custom-file-label" for="inputGroupFile01">Buscar archivo...</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          @csrf
          <button type="submit" class="btn btn-primary">Guardar nueva imagen</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
