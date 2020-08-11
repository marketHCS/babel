@extends('layouts.app')
@section('title', 'Envíos')

@section('content')

<!-- Page info -->
<div class="page-top-info mb-3 pb-3">
  <div class="container">
    <h4>Nuestros envíos</h4>
    <div class="site-pagination">
      <a href="{{ route('index') }}">Inicio</a> /
      <a href="{{ route('shipping') }}">Envíos</a>
    </div>
  </div>
</div>
<!-- Page info end -->

<section class="contact-section mt-0 mb-4 pt-0">
  <div class="container">
    <div class="row">
      <div class="col">
        <p>
          Como nuevo cliente, puedes recibir envío gratis en tu primer pedido de productos elegibles, sin mínimo de compra.
          Cualquier producto que muestre Envío GRATIS en tu primer pedido en la página de detalles del producto y que sea enviado.
        </p>
        <p>
          Cualquier producto que muestre Envío GRATIS al lado del precio en la página de detalles del producto, y que sea enviado.
          La preparación para el envío de su pedido (control de calidad, embalaje, documentación, etc.) tarda, normalmente, 1 día.
        </p>
        <p>
          El tiempo de envío puede ser mayor del previsto debido a, por ejemplo, una dirección inválida u otras circunstancias imprevistas.
          Recibirá una confirmaciòn cuando su pedido haya sido enviado.
        </p>
        <ul>
          Para determinar la tarifa de envío que corresponde para los artículos en tu Carrito:
          <li>Finaliza tu compra.</li>
          <li>Selecciona o agrega tu dirección de envío.</li>
          <li>Selecciona un método de envío y selecciona Continuar.</li>
          <li>Selecciona un método de pago y selecciona Continuar.</li>
        </ul>
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
