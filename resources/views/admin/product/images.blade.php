@extends('layouts.app')
@section('title', 'Editar imagenes')

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
        <a href="{{ route('products.show', $product) }}" class="btn btn-success my-3 float-right"><i class="far fa-file-image mr-1"></i> Añadir imagen</a>

      </div>
    </div>
  </div>
</div>
<section class="product-section">
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="row">
          @php
          use App\ImagesProduct;
          $queryImages = DB::select('select * from imagesproducts where product_id=?', [$product->id]);
          // dd($queryImages);
          @endphp
          <table class="table">
            <thead class="thead-dark">
              <th scope="col">#</th>
              <th scope="col">Imagen</th>
              <th scope="col">&nbsp;</th>
            </thead>
            <tbody>
              @foreach ($queryImages as $image)
              @php
              $resultImage = ImagesProduct::find($image->id);
              // dd($resultImage);
              @endphp
              <tr>
                <td>{{ $resultImage->id }}</td>
                <td><img src="{{ $resultImage->get_image }}" alt="Imagen no disponible, recomendado borrarla" class="thumb-destroy rounded"></td>
                <td>
                  <form action="{{ route('products.destroyImage', $resultImage) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-sm btn-danger" value="Eliminar" onclick="return confirm('¿Está seguro de que desea eliminar?')">
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
@endsection
