@extends('layouts.app')
@section('title', 'Producto')

@section('content')

<!-- Page info -->
<div class="page-top-info">
  <div class="container">
    <h4>Detalles del producto:</h4>
    <div class="site-pagination">
      <a href="{{ route('dashboard') }}">Administrador</a> >
      <a href="{{ route('products.index') }}">Productos</a>
      <div class="back-link">
        <a href="{{ route('products.index') }}" class="btn btn-danger my-3 float-left"><i class="fas fa-backward"></i> Regrezar</a>
        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning float-right my-3 mx-2">Editar</a>
        <form action="{{ route('products.delete', $product) }}" method="POST">
          @method('put')
          @csrf
          <button class="btn btn-sm btn-danger float-right my-3 mx-2">
            @if($product->statusProduct_id ==5)
            Activar
            @else
            Eliminar
            @endif
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Page info end -->

<!-- product section -->
<section class="product-section">
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            @if(count($images) > 0)
            <div class="product-pic-zoom">
              <img class="product-big-img" src="{{ $images[0]->get_image }}" alt="Producto" />
            </div>
            @endif
            <div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
              <div class="product-thumbs-track">
                @foreach($images as $image)
                <div class="pt" data-imgbigurl="{{ $image->get_image }}">
                  <img src="{{ $image->get_image }}" alt="Imagen" class="thumb" />
                </div>
                @endforeach
              </div>
            </div>
            <a href="{{ route('products.images', $product) }}" class="btn btn-success mt-5">Modificar imagenes</a>

            <div id="accordion" class="accordion-area">
              <div class="panel">
                <div class="panel-header" id="headingOne">
                  <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    Información
                  </button>
                </div>
                <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="panel-body">
                    <p>
                      {{ $product->description_prod }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 product-details">
            <h1 class="p-title-admin">{{ $product->nameProduct }} | Tee-shirt</h1>
            @if($product->descuento>0)
            <h3 class="p-price">Precio: $<span class="underline green">{{ $product->precio_prod - ($product->precio_prod * $product->descuento) }}</span> | Costo: $<span class="underline red">{{ $product->costo_prod }}</span></h3>
            @else
            <h3 class="p-price">Precio: $<span class="underline green">{{ $product->precio_prod }}</span> | Costo: $<span class="underline red">{{ $product->costo_prod }}</span></h3>
            @endif
            <h2 class="p-stock-admin">
              Estado:
              <span>
                @php
                $queryStatus = DB::select('select nameStatus from products join statusproducts s on products.statusProduct_id = s.id where products.id=?', [$product->id])
                @endphp
                {{ $queryStatus[0]->nameStatus }}
              </span>
            </h2>
            <h3 class="p-price">Descuento:
              <span class="underline">
                @if($product->descuento == null)
                No disponible
                @else
                {{ $product->descuento * 100 }}%
                @endif
              </span>
            </h3>
            <h3 class="p-price">Material: {{ $product->material_prod }}</h3>
            @php
            $queryCategory = DB::select('select nameCategory from categories join products p on categories.id = p.category_id where p.id = ?', [$product->id])
            @endphp
            <h3 class="p-price">Categoría: {{ $queryCategory[0]->nameCategory }}</h3>
            @php
            $queryProvider = DB::select('select nameProvider from providers join products p on providers.id = p.provider_id where p.id = ?;', [$product->id])
            @endphp
            <h3 class="p-price">Proveedor: {{ $queryProvider[0]->nameProvider }}</h3>
            <h5 class="p-date">Creado el: {{ $product->created_at->format('d M Y') }}</h5>
            <h5 class="p-date">Modificado el: {{ $product->updated_at->format('d M Y') }}</h5>
            @php
            $queryInventory = DB::select('select * from inventories where product_id=?', [$product->id])
            @endphp
            <div class="row my-3">
              <h5 class="p-price">Existencia por almacen: (Talla chica)</h5>
              <table class="table mt-2">
                <thead class="thead-dark">
                  <th scope="col">QRO</th>
                  <th scope="col">CDMX</th>
                  <th scope="col">GDL</th>
                </thead>
                <tbody>
                  <td scope="row">{{ $queryInventory[0]->eq_s }}</td>
                  <td scope="row">{{ $queryInventory[0]->ec_s }}</td>
                  <td scope="row">{{ $queryInventory[0]->eg_s }}</td>
                </tbody>
              </table>
            </div>
            <div class="row my-3">
              <h5 class="p-price">Existencia por almacen: (Talla mediana)</h5>
              <table class="table mt-2">
                <thead class="thead-dark">
                  <th scope="col">QRO</th>
                  <th scope="col">CDMX</th>
                  <th scope="col">GDL</th>
                </thead>
                <tbody>
                  <td scope="row">{{ $queryInventory[0]->eq_m }}</td>
                  <td scope="row">{{ $queryInventory[0]->ec_m }}</td>
                  <td scope="row">{{ $queryInventory[0]->eg_m }}</td>
                </tbody>
              </table>
            </div>
            <div class="row my-3">
              <h5 class="p-price">Existencia por almacen: (Talla grande)</h5>
              <table class="table mt-2">
                <thead class="thead-dark">
                  <th scope="col">QRO</th>
                  <th scope="col">CDMX</th>
                  <th scope="col">GDL</th>
                </thead>
                <tbody>
                  <td scope="row">{{ $queryInventory[0]->eq_g }}</td>
                  <td scope="row">{{ $queryInventory[0]->ec_g }}</td>
                  <td scope="row">{{ $queryInventory[0]->eg_g }}</td>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- product section end -->


@endsection
