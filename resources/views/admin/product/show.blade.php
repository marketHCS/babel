@extends('layouts.app')
@section('title', 'Producto')

@section('content')

<!-- Page info -->
<div class="page-top-info">
  <div class="container">
    <h4>¿Te gustó?</h4>
    <div class="site-pagination">
      <a href="">Inicio</a> >
      <a href="">Producto</a>
    </div>
  </div>
</div>
<!-- Page info end -->

<!-- product section -->
<section class="product-section">
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="back-link">
          <a href="{{ route('products.index') }}" class="btn btn-danger mt-5"><i class="fas fa-backward"></i> Regrezar</a> </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="product-pic-zoom">
              @php
              use App\ImagesProduct;
              $queryId = DB::select('select * from imagesproducts join products p on imagesproducts.product_id = p.id where p.id=?', [$product->id]);
              $queryImage = ImagesProduct::find($queryId[0]->product_id);
              @endphp
              <img class="product-big-img" src="{{ $queryImage->get_image }}" alt="Producto" />
            </div>
            <div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
              <div class="product-thumbs-track">
                @foreach($queryId as $result)
                @php
                $resultImage = ImagesProduct::find($result->product_id);
                @endphp
                <div class="pt" data-imgbigurl="{{ $resultImage->get_image }}">
                  <img src="{{ $resultImage->get_image }}" alt="Imagen" class="thumb" />
                </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-lg-6 product-details">
            <h1 class="p-title-admin">{{ $product->nameProduct }} | Tee-shirt</h1>
            <h3 class="p-price">$ <span class="underline green">{{ $product->precio_prod }}</span> | $ <span class="underline red">{{ $product->costo_prod }}</span></h3>
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
                {{ $product->descuento * 100 }}
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
        </div>
      </div>
    </div>
  </div>
</section>
<!-- product section end -->


@endsection
