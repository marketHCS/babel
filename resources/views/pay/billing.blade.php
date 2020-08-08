@extends('layouts.app')
@section('title', 'Facturación')

@section('content')
<!-- Page info -->
<div class="page-top-info pb-5">
  <div class="container">
    <h4>Your cart</h4>
    <div class="site-pagination">
      <a href="{{ route('index') }}">Inicio</a> >
      <a href="{{ route('cart') }}">Tu carrito</a>
    </div>
  </div>
</div>
<!-- Page info end -->


<!-- checkout section  -->
<section class="checkout-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 order-2 order-lg-1">

        @php
        $hola = Auth::user();
        // dd($hola);
        $address = DB::select('select * from addresses where user_id = ? limit 1', [Auth::user()->id]);
        // dd($address);
        @endphp
        @if(!empty($address))
        <form action="{{ route('pay.confirm', Auth::user()) }}" method="POST">
          <div class="form-group">
            <label for="cp">*Codigo postal</label>
            <label for="phone" class="float-right">Número de teléfono</label>
            <div class="form-row">
              <div class="col">
                <input type="number" name="cp" id="cp" class="form-control" value="{{ $address[0]->cp }}" required />
              </div>
              <div class="col">
                <a class="btn btn-success float-right mr-4" id="buttonVerification">Comprobar CP</a>
              </div>
              <div class="col">
                <input type="number" id="phone" class="form-control" name='phone' required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <label for="completeName">Nombre completo:</label>
              <input type="text" id="completeName" name="completeName" class="form-control" required>
              <small id="helper2" class="form-text text-muted">
                Nombre de quien recibirá el pedido.
              </small>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-4">
                <label for="estate">Estado</label>
                <div id="estateId">
                  <select name="estate" id="estate" class="form-control custom-select">
                    <option value="{{ $address[0]->estate }}">{{ $address[0]->estate }}</option>
                  </select>
                </div>
              </div>
              <div class="col-4">
                <label for="city">Ciudad o municipio</label>
                <div id="cityId">
                  <select name="city" id="city" class="form-control custom-select">
                    <option value="{{ $address[0]->city }}">{{ $address[0]->city }}</option>
                  </select>
                </div>
              </div>
              <div class="col-4">
                <label for="interiorNumberAddress">Colonia</label>
                <div id="suburbId">
                  <select name="suburb" id="suburb" class="form-control custom-select">
                    <option value="{{  $address[0]->suburb }}">{{ $address[0]->suburb }}</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="street">Calle</label>
            <div id="streetId">
              <input type="text" name="street" id="street" class="form-control" value="{{ $address[0]->street }}" required />
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-6">
                <label for="exteriorNumberAddress">Número exterior</label>
                <div id="exteriorNumberAddressId">
                  <input type="number" name="exteriorNumberAddress" id="exteriorNumberAddress" class="form-control" value="{{  $address[0]->exteriorNumberAddress }}" required />
                </div>
              </div>
              <div class="col-6">
                <label for="interiorNumberAddress">Número interior</label>
                <div id="interiorNumberAddressId">
                  <input type="number" name="interiorNumberAddress" id="interiorNumberAddress" class="form-control" value="{{  $address[0]->interiorNumberAddress }}" aria-describedby="helper" required />
                  <small id="helper" class="form-text text-muted">
                    En caso de no poseer, dejar el campo en valor 0.
                  </small>
                </div>
              </div>
            </div>
          </div>
          @csrf
          <button class="site-btn submit-order-btn" type="submit">Proceder a pagar</button>
        </form>
        @else
        <form action="{{ route('pay.confirm', Auth::user()) }}" method="POST">
          <div class="form-group">
            <label for="cp">*Codigo postal</label>
            <label for="phone" class="float-right">Número de teléfono</label>
            <div class="form-row">
              <div class="col">
                <input type="number" name="cp" id="cp" class="form-control" value="" required />
              </div>
              <div class="col">
                <a class="btn btn-success float-right mr-4" id="buttonVerification">Comprobar CP</a>
              </div>
              <div class="col">
                <input type="number" id="phone" class="form-control" name='phone' required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <label for="completeName">Nombre completo:</label>
              <input type="text" id="completeName" name="completeName" class="form-control" required>
              <small id="helper2" class="form-text text-muted">
                Nombre de quien recibirá el pedido.
              </small>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-4">
                <label for="estate">Estado</label>
                <div id="estateId">
                  <select name="estate" id="estate" class="form-control custom-select">
                    <option>Seleccionar</option>
                  </select>
                </div>
              </div>
              <div class="col-4">
                <label for="city">Ciudad o municipio</label>
                <div id="cityId">
                  <select name="city" id="city" class="form-control custom-select">
                    <option>Seleccionar</option>
                  </select>
                </div>
              </div>
              <div class="col-4">
                <label for="interiorNumberAddress">Colonia</label>
                <div id="suburbId">
                  <select name="suburb" id="suburb" class="form-control custom-select">
                    <option>Seleccionar</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="street">Calle</label>
            <div id="streetId">
              <input type="text" name="street" id="street" class="form-control" value="" required />
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-6">
                <label for="exteriorNumberAddress">Número exterior</label>
                <div id="exteriorNumberAddressId">
                  <input type="number" name="exteriorNumberAddress" id="exteriorNumberAddress" class="form-control" value="" required />
                </div>
              </div>
              <div class="col-6">
                <label for="interiorNumberAddress">Número interior</label>
                <div id="interiorNumberAddressId">
                  <input type="number" name="interiorNumberAddress" id="interiorNumberAddress" class="form-control" value="" aria-describedby="helper" required />
                  <small id="helper" class="form-text text-muted">
                    En caso de no poseer, dejar el campo en valor 0.
                  </small>
                </div>
              </div>
            </div>
          </div>
          <div class="cf-title un-titulo">Delievery Info</div>
          <div class="row shipping-btns">
            <div class="col-6">
              <h4>Básico</h4>
            </div>
            <div class="col-6">
              <div class="cf-radio-btns">
                <div class="cfr-item">
                  <input type="radio" id="ship-1" checked>
                  <label for="ship-1">Gratis</label>
                </div>
              </div>
            </div>
          </div>
          @csrf
          <button class="site-btn submit-order-btn" type="submit">Proceder a pagar</button>
        </form>
        @endif
      </div>
      <div class="col-lg-4 order-1 order-lg-2">
        <div class="checkout-cart">
          <h3>Tu carrito</h3>
          <ul class="product-list">
            @php
            $grandTotal = 0;
            @endphp
            @foreach ($cart as $item)
            @php
            // dd($item);
            $image = DB::select('select url from imagesproducts where product_id = ? limit 1', [$item['product']->id]);
            @endphp
            <li>
              <div class="pl-thumb"><img src="{{ url("storage/".$image[0]->url) }}" class="image-pay" alt=""></div>
              <h6>{{ $item['product']->nameProduct }}</h6>
              @php
              $total = $item['product']->precio_prod * (int) $item['quant'];
              $grandTotal += $total;
              @endphp
              <p>${{ $total }}</p>
            </li>
            @endforeach
          </ul>
          <ul class="price-list">
            <li>Total<span>${{ $grandTotal }}</span></li>
            <li>Envío<span>Gratis</span></li>
            <li class="total">Total<span>${{ $grandTotal }}</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- checkout section end -->

<script src="{{ asset('js/addressVerificationPay.js') }}"></script>


@endsection
