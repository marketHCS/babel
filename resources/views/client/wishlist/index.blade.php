@extends('layouts.app')
@section('title', 'Lista de deseos')

@section('content')
<!-- cart section end -->

<section class="cart-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="cart-table">
          <h3>Tu lista de deseos</h3>
          <div class="cart-table-warp">

            <table>
              <thead>
                <tr>
                  <th class="product-th">Producto</th>
                  <th class="size-th pr-1">Descripción</th>
                  <th class="total-th">&nbsp;</th>
                </tr>
              </thead>
              <tbody id="container-wishlist">

              </tbody>
            </table>
          </div>
          <div class="total-cost">
            </h6>
          </div>
        </div>
      </div>
      <div class="col-lg-4 card-right">
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
            <img src="{{ url($image[0]->url) }}" alt="{{ $product->nameProduct }}" class="last-image-product" />
          </a>
          @if ($inventories[0]->eq_s > 0 ||$inventories[0]->eq_m > 0 || $inventories[0]->eq_g > 0 || $inventories[0]->ec_s > 0 ||$inventories[0]->ec_m > 0 || $inventories[0]->ec_g > 0 || $inventories[0]->eg_s > 0 ||$inventories[0]->eg_m > 0 || $inventories[0]->eg_g > 0)
          <div class="pi-links">
            <a href="{{ route('product.show', $product->id) }}" class="add-card"><i class="flaticon-bag"></i><span>al carrito!!!</span></a>
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
  <script src="{{ asset('js/wishlist.js') }}"></script>
</section>
@endsection
