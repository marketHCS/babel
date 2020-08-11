@extends('layouts.app')
@section('title', '¡Contactanos!')

@section('content')

<!-- Page info -->
<div class="page-top-info mb-5">
  <div class="container">
    <h4>Nuestras sucursales</h4>
    <div class="site-pagination">
      <a href="{{ route('index') }}">Inicio</a> /
      <a href="{{ route('support') }}">Contacto</a>
    </div>
  </div>
</div>
<!-- Page info end -->

<section class="contact-section mt-0 pt-0">
  <div class="container">
    <div class="row">
      <button class="accordion">Querétaro</button>
      <div class="panel">
        <div class="col-lg-6 contact-info">
          <h3 class="mt-4">¡Visita nuestra sucursal!</h3>
          <p>
            Av. Pie de la Cuesta 2501, Nacional, 76148 Santiago de
            Querétaro, Qro.
          </p>
          <p>+52 773 159 8533</p>
          <p>babelclothes@gmail.com</p>
        </div>
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.38403086495!2d-100.40828248507535!3d20.65394950584361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d35a486363880d%3A0xd927286fe3c75218!2sUTEQ!5e0!3m2!1ses-419!2smx!4v1597113280660!5m2!1ses-419!2smx" style="border: 0;" allowfullscreen></iframe>
        </div>
      </div>
      <button class="accordion">Ciudad de México</button>
      <div class="panel">
        <div class="col-lg-6 contact-info">
          <h3 class="mt-4">¡Visita nuestra sucursal!</h3>
          <p>
            Av. Paseo de la Reforma, Juárez, Cuauhtémoc, 06500 Ciudad de
            México, CDMX
          </p>
          <p>+52 773 159 8533</p>
          <p>babelclothes@gmail.com</p>
        </div>
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1881.3307860565562!2d-99.16869369191163!3d19.427023126223215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff35f5bd1563%3A0x6c366f0e2de02ff7!2sEl%20%C3%81ngel%20de%20la%20Independencia!5e0!3m2!1ses-419!2smx!4v1597114741822!5m2!1ses-419!2smx" style="border: 0;" allowfullscreen></iframe>
        </div>
      </div>
      <button class="accordion">Guadalajara</button>
      <div class="panel">
        <div class="col-lg-6 contact-info">
          <h3 class="mt-4">¡Visita nuestra sucursal!</h3>
          <p>Reforma 44890 Guadalajara, Jal.</p>
          <p>+52 773 159 8533</p>
          <p>babelclothes@gmail.com</p>
        </div>
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.0105813452647!2d-103.33572248507514!3d20.669148505333204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b18ae36b92ed%3A0xd42dcbad9e7b45b!2sRiva%20Palacio%2C%20Reforma%2C%2044890%20Guadalajara%2C%20Jal.!5e0!3m2!1ses-419!2smx!4v1597114809986!5m2!1ses-419!2smx" style="border: 0;" allowfullscreen></iframe>
        </div>
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
