@extends('layouts.app')
@section('title', 'Todos los productos')

@section('content')
<!-- Page info -->
<div class="page-top-info pb-5">
  <div class="container">
    <h4>Todos los productos.</h4>
    <div class="site-pagination">
      <a href="{{ route('index') }}">Inicio</a> >
      <a href="{{ route('product.index') }}">Productos</a>
    </div>
  </div>
</div>
<!-- Page info end -->

<!-- Category section -->
<section class="category-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 order-2 order-lg-1">
        <div class="filter-widget">
          <h2 class="fw-title">Tee-Shirts</h2>
        </div>

        <div class="filter-widget">
          <h2 class="fw-title">Categorías</h2>
          <ul class="category-menu">
            @foreach($categories as $category)
            <li>
              <a href="{{ route('product.category', $category) }}">{{ $category->nameCategory }}</span></a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
        <div class="row" id="products">
          @foreach ($products as $product)
          @php
          $image = DB::select('select url from imagesproducts where product_id = ? limit 1', [$product->id]);
          // dd($image);
          @endphp
          @if(count($image)>0)
          <div class="col-lg-4 col-sm-6">
            <div class="product-item">
              <div class="pi-pic">
                <div class="tag-sale">¡Nuevo!</div>
                <a href="{{ route('product.show',$product->id) }}">
                  <img src="{{ url("storage/".$image[0]->url) }}" alt="{{ $product->nameProduct }}" class="image-fit" />
                </a>
                @if ($inventories[$product->id - 1]->eq_s > 0 ||$inventories[$product->id - 1]->eq_m > 0 || $inventories[$product->id - 1]->eq_g > 0 || $inventories[$product->id - 1]->ec_s > 0 ||$inventories[$product->id - 1]->ec_m > 0 || $inventories[$product->id - 1]->ec_g > 0 || $inventories[$product->id - 1]->eg_s > 0 ||$inventories[$product->id - 1]->eg_m > 0 || $inventories[$product->id - 1]->eg_g > 0)
                <div class="pi-links">
                  <a href="{{ route('addToCart', $product->id) }}" class="add-card"><i class="flaticon-bag"></i><span>¡Al carrito!</span></a>
                </div>
                @endif
              </div>
              <div class="pi-text">
                <h6>$ {{ $product->precio_prod }}</h6>
                <p>{{ $product->nameProduct }}</p>
              </div>
            </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
{{-- <script src="{{ asset('js/productsIndex.js') }}"></script> --}}
<!-- Category section end -->
@endsection
