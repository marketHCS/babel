@extends('layouts.app')
@section('title', 'Carrito de compras')

@section('content')
<!-- cart section end -->
<section class="cart-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="cart-table">
          <h3>Tu carrito</h3>
          <div class="cart-table-warp">
            {{-- <a href="{{ route('index') }}" class="site-btn sb-dark">Continua comprando</a>
            <a href="{{ route('cart.reset') }}" class="site-btn sb-dark">Vaciar carrito</a> --}}
            {{-- @php
            // dd(Session::get('cart'))
            @endphp --}}


            @if (empty($cart))
            <h3>No tienes ningún producto en tu carrito :(</h3>
            @else
            <table>
              <thead>
                <tr>
                  <th class="product-th">Producto</th>
                  <th class="quy-th">Cantidad</th>
                  <th class="size-th pr-1">Talla</th>
                  <th class="total-th">Subtotal</th>
                  <th class="total-th">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @php
                $count = 1;
                $i = 0;
                @endphp
                @foreach($cart as $element)
                @php
                // dd($cart);
                // dd($element);
                $image = DB::select('select url from imagesproducts where product_id = ? limit 1', [$element['product']->id])
                @endphp

                <tr>
                  <td class="product-col">
                    <img src="{{ url("storage/".$image[0]->url) }}" alt="{{ $element['product']->nameProduct }}" />
                    <div class="pc-title">
                      <h4>{{ $element['product']->nameProduct }} | Tee-shirt</h4>
                      <p id="prec-{{ $count }}">$<span class="price">{{ $element['product']->precio_prod }}</span></p>
                    </div>
                  </td>
                  <td class="quy-col">
                    <div class="quantity">
                      <div class="quantsContainer size-col">
                        <h4 class="p-0 quants">{{ $element['quant'] }}</h4>
                      </div>
                    </div>
                  </td>
                  <td class="size-col text-center">
                    @php
                    $size = '';
                    if($element['size'] == 1){
                    $size = 'Chica';
                    }elseif($element['size'] == 2){
                    $size = 'Mediana';
                    }elseif($element['size'] == 3){
                    $size = 'Grande';
                    }
                    @endphp
                    <h4 class="text-center pr-0 mr-2">{{ $size }}</h4>
                  </td>
                  <td class="total-col">
                    <h4>$<span class="subtotal"></span></h4>
                  </td>
                  <td>
                    <a href="{{ route('cart.destroy', $i) }}" class="btn btn-danger ml-4"><i class="far fa-trash-alt"></i></a>
                  </td>
                </tr>
                @php
                $count++;
                $i++;
                @endphp
                @endforeach
              </tbody>
            </table>
            @endif
          </div>
          <div class="total-cost">
            <h6>
              Total
              <span id="total">$<span id="totalSpan"></span></span>
            </h6>
          </div>
        </div>
      </div>
      <div class="col-lg-4 card-right">
        @if(!empty($cart))
        <a href="{{ route('pay.prebilling') }}" class="site-btn">Proceder a pagar</a>
        <a href="{{ route('cart.reset') }}" class="site-btn sb-dark">Vaciar carrito</a>
        @endif
        <a href="{{ route('index') }}" class="site-btn sb-dark">Continua comprando</a>
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
</section>
<!-- letest product section end -->
<script src="{{ asset('js/cart.js') }}"></script>
@endsection
