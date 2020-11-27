@extends('layouts.app')
@section('title', 'Confirmar compra')

@section('content')

<!-- Load Stripe.js on your website. -->
<script src="https://js.stripe.com/v3"></script>

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
        <form action="" method="">
          <div class="form-group">
            <label for="cp">*Codigo postal</label>
            <label for="phone" class="float-right">Número de teléfono</label>
            <div class="form-row">
              <div class="col">
                <input type="number" name="cp" id="cp" class="form-control" value="{{ $address->cp }}" disabled />
              </div>
              <div class="col">
                <input type="number" id="phone" class="form-control" name='phone' value="{{ $sell->phone }}" disabled>
              </div>
            </div>

          </div>
          <div class="form-group">
            <div class="form-row">
              <label for="completeName">Nombre completo:</label>
              <input type="text" id="completeName" name="completeName" class="form-control" value="{{ $sell->name }}" disabled>
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
                  <input type="text" id="estate" name="estate" class="form-control" value="{{ $address->estate }}" disabled>
                </div>
              </div>
              <div class="col-4">
                <label for="city">Ciudad o municipio</label>
                <div id="cityId">
                  <input type="text" class="form-control" id="city" name="city" value="{{ $address->city }}" disabled>
                </div>
              </div>
              <div class="col-4">
                <label for="suburb">Colonia</label>
                <div id="suburbId">
                  <input type="text" id="suburb" name="suburb" class="form-control" value="{{ $address->suburb }}" disabled>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="street">Calle</label>
            <div id="streetId">
              <input type="text" name="street" id="street" class="form-control" value="{{ $address->street }}" disabled />
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-6">
                <label for="exteriorNumberAddress">Número exterior</label>
                <div id="exteriorNumberAddressId">
                  <input type="number" name="exteriorNumberAddress" id="exteriorNumberAddress" class="form-control" value="{{ $address->exteriorNumberAddress }}" disabled />
                </div>
              </div>
              <div class="col-6">
                <label for="interiorNumberAddress">Número interior</label>
                <div id="interiorNumberAddressId">
                  <input type="number" name="interiorNumberAddress" id="interiorNumberAddress" class="form-control" value="{{  $address->interiorNumberAddress }}" aria-describedby="helper" disabled />
                  <small id="helper" class="form-text text-muted">
                    En caso de no poseer, dejar el campo en valor 0.
                  </small>
                </div>
              </div>
            </div>
          </div>
          @csrf
          @php
          // dd($priceId->id);
          @endphp

          <button class="site-btn submit-order-btn" id="checkout-button-{{ $priceId->id }}" role="link" type="button">
            Proceder a pagar
          </button>
          <a href="{{ route('pay.prebilling') }}" class="site-btn submit-order-btn mt-3 no-toques" type="submit">
            Regresar
          </a>
        </form>
      </div>



      <div id="error-message"></div>

      <script>
        (function() {
          var stripe = Stripe('pk_test_51HAW7xJMj1omTiKmT3akmET0lJfMWeI6M6kCeT9ZYxaSinc24GoadGydQDSe8Yoo1YV039tYqbA0isi1wdNSDhKe00X4lv9gCi');

          var checkoutButton = document.getElementById('checkout-button-{{  $priceId->id }}');
          checkoutButton.addEventListener('click', function() {
            // When the customer clicks on the button, redirect
            // them to Checkout.
            stripe.redirectToCheckout({
                lineItems: [{
                  price: '{{  $priceId->id }}'
                  , quantity: 1
                }]
                , mode: 'payment',
                // Do not rely on the redirect to the successUrl for fulfilling
                // purchases, customers may not always reach the success_url after
                // a successful payment.
                // Instead use one of the strategies described in
                // https://stripe.com/docs/payments/checkout/fulfillment
                successUrl: window.location.protocol + '//127.0.0.1:8000/success'
                , cancelUrl: window.location.protocol + '//127.0.0.1:8000/canceled'
              , })
              .then(function(result) {
                if (result.error) {
                  // If `redirectToCheckout` fails due to a browser or network
                  // error, display the localized error message to your customer.
                  var displayError = document.getElementById('error-message');
                  displayError.textContent = result.error.message;
                }
              });
          });
        })();

      </script>




















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
              <div class="pl-thumb"><img src="{{ url($image[0]->url) }}" class="image-pay" alt=""></div>
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

{{-- <script src="{{ asset('js/addressVerificationPay.js') }}"></script> --}}


@endsection
