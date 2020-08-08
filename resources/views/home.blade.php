@extends('layouts.app')
@section('title', 'Inicio')
@section('content')

<!-- Hero section -->
<section class="hero-section">
  <div class="hero-slider owl-carousel">
    <div class="hs-item set-bg" data-setbg="{{ asset('img/banner-1.jpg') }}">
      @php
          $t1 = DB::select('select * from products where id = ?', [6]);
      @endphp
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-7 text-white">
            <span class="shadows">¡Nuevo!</span>
            <h2 class="shadows">{{ $t1[0]->nameProduct }}<br/>Tee-Shirt</h2>
            <p class="nbsp">
              &nbsp;
            </p>
            <a href="{{ route('product.show', $t1[0]->id) }}" class="site-btn sb-line shadows">ver más</a>
            <a href="{{ route('product.show', $t1[0]->id) }}" class="site-btn sb-white shadows">Añadir al carrito</a>
          </div>
        </div>
        <div class="offer-card text-white">
          <h2>${{ $t1[0]->precio_prod }}</h2>
          <p class="shadows">Obtenla</p>
        </div>
      </div>
    </div>
    <div class="hs-item set-bg" data-setbg="{{ asset('img/banner-2.jpg') }}">
      @php
          $t2 = DB::select('select * from products where id = ?', [8]);
          // dd($t2);
      @endphp
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-7 text-white">
            <span class="shadows">¡Nuevo!</span>
            <h2 class="shadows">{{ $t2[0]->nameProduct }}<br/>Tee-shirt</h2>
            <p class="nbsp">
              &nbsp;
            </p>
            <a href="{{ route('product.show', $t2[0]->id) }}" class="site-btn sb-line shadows">Ver más</a>
            <a href="{{ route('product.show', $t2[0]->id) }}" class="site-btn sb-white shadows">Añadir al carrito</a>
          </div>
        </div>
        <div class="offer-card text-white">
          <h2>${{ $t2[0]->precio_prod }}</h2>
          <p class="shadows">Obtenla</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="slide-num-holder" id="snh-1"></div>
  </div>
</section>
<!-- Hero section end -->

<!-- Features section -->
<section class="features-section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 p-0 feature">
        <div class="feature-inner">
          <div class="feature-icon">
            <img src="{{ asset('img/icons/1.png') }}" alt="#" />
          </div>
          <h2>Pagos fáciles y seguros</h2>
        </div>
      </div>
      <div class="col-md-4 p-0 feature">
        <div class="feature-inner">
          <div class="feature-icon">
            <img src="{{ asset('img/icons/2.png') }}" alt="#" />
          </div>
          <h2>Calidad premium</h2>
        </div>
      </div>
      <div class="col-md-4 p-0 feature">
        <div class="feature-inner">
          <div class="feature-icon">
            <img src="{{ asset('img/icons/3.png') }}" alt="#" />
          </div>
          <h2>Envíos rapidos y accesibles</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Features section end -->

<!-- letest product section -->
<section class="top-letest-product-section">
  <div class="container">
    <div class="section-title">
      <h2>Últimos productos</h2>
    </div>
    <div class="product-slider owl-carousel">
      @foreach ($lastProducts as $product)
      @php
      $image = DB::select('select url from imagesproducts where product_id = ? limit 1', [$product->id]);
      // dd($image);
      $inventories = DB::select('select * from inventories where product_id = ?', [$product->id])
      @endphp
      @if(count($image)>0)
      <div class="product-item">
        <div class="pi-pic">
          <div class="tag-new">Nuevo</div>
          <a href="{{ route('product.show',$product->id) }}">
            <img src="{{ url("storage/".$image[0]->url) }}" alt="{{ $product->nameProduct }}" class="last-image-product" />
          </a>
          @if ($inventories[0]->eq_s > 0 ||$inventories[0]->eq_m > 0 || $inventories[0]->eq_g > 0 || $inventories[0]->ec_s > 0 ||$inventories[0]->ec_m > 0 || $inventories[0]->ec_g > 0 || $inventories[0]->eg_s > 0 ||$inventories[0]->eg_m > 0 || $inventories[0]->eg_g > 0)
          <div class="pi-links">
            <a href="{{ route('product.show', $product->id) }}" class="add-card"><i class="flaticon-bag"></i><span>¡Al carrito!</span></a>
          </div>
          @endif
        </div>
        <div class="pi-text">
          <h6>${{ $product->precio_prod }}</h6>
          <p>{{ $product->nameProduct }} | Tee-shirt</p>
        </div>
      </div>
      @endif
      @endforeach
    </div>
  </div>
</section>
<!-- letest product section end -->


@endsection
