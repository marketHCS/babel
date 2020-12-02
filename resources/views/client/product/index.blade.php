@extends('layouts.app')
@section('title', 'Todos los productos')

@section('content')
<!-- Page info -->
<div class="page-top-info pb-5">
  <div class="container">
    <h4>Todos los productos.</h4>
    <div class="site-pagination">
      <a href="{{ route('index') }}">Inicio</a> >
      <a href="{{ route('product.index') }}">Productos</a>
    </div>
  </div>
</div>
<!-- Page info end -->

<!-- Category section -->
<section class="category-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 order-2 order-lg-1">
        <div class="filter-widget">
          <h2 class="fw-title">Tee-Shirts</h2>
        </div>

        <div class="filter-widget">
          <h2 class="fw-title">Categorías</h2>
          <ul class="category-menu">
            @foreach($categories as $category)
            <li>
              <a href="{{ route('product.category', $category) }}">{{ $category->nameCategory }}</span></a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
        <div class="row" id="products">

        </div>
      </div>
    </div>
  </div>
</section>
{{-- <script src="{{ asset('js/productsIndex.js') }}"></script> --}}
<!-- Category section end -->
<script src="{{ asset('js/productList.js') }}"></script>
@endsection
