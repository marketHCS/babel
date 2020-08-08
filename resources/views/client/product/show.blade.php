@extends('layouts.app')
@section('title', 'Producto')

@section('content')

<!-- Page info -->
<div class="page-top-info">
  <div class="container">
    <h4>Detalles del producto:</h4>
    <div class="site-pagination">
      <a href="{{ route('index') }}">Inicio</a> >
      <a href="{{ route('product.index') }}">Productos</a>
      <div class="back-link">
        <a href="{{ route('product.index') }}" class="btn btn-danger my-3 float-left"><i class="fas fa-backward"></i> Regrezar</a>
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
          </div>
          <div class="col-lg-6 product-details">
            <div class="row">
              <div class="col">
                <div class="row">
                  <h2 class="p-title mr-5">{{ $product->nameProduct }} | Tee-shirt</h2> <br />
                  @if($product->descuento>0)
                  <br>
                  <h3 class="p-price-client float-right ml-auto mr-5">$<span class="underline green">{{ $product->precio_prod - ($product->precio_prod * $product->descuento) }}</span></h3>
                  @else
                  <br>
                  <h3 class="p-price-client float-right ml-auto mr-5">$<span class="underline green">{{ $product->precio_prod }}</span></h3>
                  @endif
                </div>
                <div class="row">
                  <form action="{{ route('cart.store', $product->id) }}" method="POST">
                    <div class="form-row">
                      @if($existence)
                      <div class="fw-size-choose">
                        <p>Tallas disponibles:</p>
                        @if ($small)
                        <div class="sc-item">
                          <input type="radio" name="size" id="s-size" value="1" />
                          <label for="s-size" class="only-show">CH</label>
                        </div>
                        @endif
                        @if ($medium)
                        <div class="sc-item">
                          <input type="radio" name="size" id="m-size" value="2" checked />
                          <label for="m-size" class="only-show">M</label>
                        </div>
                        @endif
                        @if ($large)
                        <div class="sc-item">
                          <input type="radio" name="size" id="g-size" value="3" />
                          <label for="g-size" class="only-show">G</label>
                        </div>
                        @endif
                      </div>
                      @endif
                    </div>
                    @if($existence)
                    <div class="quantity">
                      <p>Cantidad</p>
                      <div class="pro-qty">
                        <input type="text" value="1" min="1" pattern="^[1-9]+" name="quant" required />
                      </div>
                    </div>
                    @endif
                    @if($existence)
                    @csrf
                    <button type="submit" class="site-btn">Agregar al carrito</button>
                    @else
                    <h4 class="underline">Sin existencias disponibles.</h4>
                    @endif
                  </form>
                </div>
              </div>
            </div>
            <div class="row">
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
                      <div class="info-container mt-1">
                        <h2 class="p-stock-client">
                          Estado:
                          <span>
                            @php
                            $queryStatus = DB::select('select nameStatus from products join statusproducts s on products.statusProduct_id = s.id where products.id=?', [$product->id])
                            @endphp
                            {{ $queryStatus[0]->nameStatus }}
                          </span>
                        </h2>
                        @if($product->descuento>0)
                        <h3 class="p-stock-client">Descuento:
                          <span class="underline">
                            {{ $product->descuento * 100 }}%
                          </span>
                        </h3>
                        @endif
                        <h3 class="p-stock-client">Material: {{ $product->material_prod }}</h3>
                        @php
                        $queryCategory = DB::select('select nameCategory from categories join products p on categories.id = p.category_id where p.id = ?', [$product->id])
                        @endphp
                        <h3 class="p-stock-client">Categoría: {{ $queryCategory[0]->nameCategory }}</h3>
                        @php
                        $queryProvider = DB::select('select nameProvider from providers join products p on providers.id = p.provider_id where p.id = ?;', [$product->id])
                        @endphp
                        <h5 class="p-date">Creado el: {{ $product->created_at->format('d M Y') }}</h5>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-header" id="headingTwo">
                    <button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                      Pago
                    </button>
                  </div>
                  <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="panel-body">
                      <img src="{{ asset('img/cards.png') }}" alt="" />
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Proin pharetra tempor so dales. Phasellus
                        sagittis auctor gravida. Integer bibendum sodales arcu
                        id te mpus. Ut consectetur lacus leo, non scelerisque
                        nulla euismod nec.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-header" id="headingThree">
                    <button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                      Envíos
                    </button>
                  </div>
                  <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="panel-body">
                      <h4>Envíos a todo México</h4>
                      <p>
                        Costro apróximado:<br />
                        $100 / envío <br />
                        <span>6 - 10 días habiles</span>
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
  </div>
</section>
<!-- product section end -->


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




@endsection
