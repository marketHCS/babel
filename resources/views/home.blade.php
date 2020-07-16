@extends('layouts.app')

@section('content')

<!-- Hero section -->
<section class="hero-section">
  <div class="hero-slider owl-carousel">
    <div class="hs-item set-bg" data-setbg="{{ asset('img/banner-1.jpg') }}">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-7 text-white">
            <span>¡Nuevo!</span>
            <h2>Toy Story</h2>
            <p class="nbsp">
              &nbsp;
            </p>
            <a href="#" class="site-btn sb-line">ver más</a>
            <a href="#" class="site-btn sb-white">Añadir al carrito</a>
          </div>
        </div>
        <div class="offer-card text-white">
          <h2>$300</h2>
          <p>Obtenla</p>
        </div>
      </div>
    </div>
    <div class="hs-item set-bg" data-setbg="{{ asset('img/banner-2.jpg') }}">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-7 text-white">
            <span>¡Nuevo!</span>
            <h2>Looney Toones</h2>
            <p class="nbsp">
              &nbsp;
            </p>
            <a href="#" class="site-btn sb-line">Ver más</a>
            <a href="#" class="site-btn sb-white">Añadir al carrito</a>
          </div>
        </div>
        <div class="offer-card text-white">
          <h2>$300</h2>
          <p>Obtenla</p>
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
      <div class="product-item">
        <div class="pi-pic">
          <div class="tag-new">Nuevo</div>
          <img src="{{ asset('img/product/1.jpg') }}" alt="" />
          <div class="pi-links">
            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>al carrito!!!</span></a>
            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
          </div>
        </div>
        <div class="pi-text">
          <h6>$300.00</h6>
          <p>Bob y Patricio | Tee-shirt</p>
        </div>
      </div>
      <div class="product-item">
        <div class="pi-pic">
          <div class="tag-new">Nuevo</div>
          <img src="{{ asset('img/product/2.jpg') }}" alt="" />
          <div class="pi-links">
            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>al carrito!!!</span></a>
            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
          </div>
        </div>
        <div class="pi-text">
          <h6>$300.00</h6>
          <p>No me acuerdo del nombre de la playera ): | Tee-shirt</p>
        </div>
      </div>
      <div class="product-item">
        <div class="pi-pic">
          <div class="tag-new">Nuevo</div>
          <img src="{{ asset('img/product/3.jpg') }}" alt="" />
          <div class="pi-links">
            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>al carrito!!!</span></a>
            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
          </div>
        </div>
        <div class="pi-text">
          <h6>$300.00</h6>
          <p>Return of the Jedi | Tee-shirt</p>
        </div>
      </div>
      <div class="product-item">
        <div class="pi-pic">
          <div class="tag-new">Nuevo</div>
          <img src="{{ asset('img/product/4.jpg') }}" alt="" />
          <div class="pi-links">
            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>al carrito!!!</span></a>
            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
          </div>
        </div>
        <div class="pi-text">
          <h6>$300.00</h6>
          <p>A new hope | Tee-shirt</p>
        </div>
      </div>
      <div class="product-item">
        <div class="pi-pic">
          <div class="tag-new">Nuevo</div>
          <img src="{{ asset('img/product/6.jpg') }}" alt="" />
          <div class="pi-links">
            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>al carrito!!!</span></a>
            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
          </div>
        </div>
        <div class="pi-text">
          <h6>$300.00</h6>
          <p>Silvestre | Tee-shirt</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- letest product section end -->


@endsection
