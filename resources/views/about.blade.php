@extends('layouts.app')
@section('title', 'Conócenos')

@section('content')

<!-- Page info -->
<div class="page-top-info mb-3 pb-3">
  <div class="container">
    <h4>Nuestras sucursales</h4>
    <div class="site-pagination">
      <a href="{{ route('index') }}">Inicio</a> /
      <a href="{{ route('about.us') }}">Acerca de nosotros</a>
    </div>
  </div>
</div>
<!-- Page info end -->

<section class="contact-section mt-0 mb-4 pt-0">
  <div class="container">
    <div class="row">
      <div class="col-md-6 center">
        <p>
          Somos una empresa 100% mexicana que busca
          dar a conocer el talento e imaginación de los mexicanos. Asimismo apoyamos el ingresos
          de nuestros compradores poniendo su disposición nuestros precios bajos.
          <br>
          En Babel sabemos que el diseño de la ropa habla mucho sobre nuestra personalidad,
          estilo y muchas veces ayuda a mejorar expresarnos, por lo que temenos diseños únicos y de gran calidad.
        </p>
      </div>
      <div class="col-md-6">
        <img src="{{ asset('images/babels.png') }}" class="image-static float-right" alt="Babel">
      </div>
    </div>
  </div>
</section>

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


<script src="{{ asset('js/support.js') }}"></script>
@endsection
