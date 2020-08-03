@extends('layouts.app')

@section('title', 'Compra')

@section('content')
<!-- Page info -->
<div class="page-top-info">
  <div class="container">
    <h4>Detalles del la compra:</h4>
    <div class="site-pagination">
      <a href="{{ route('dashboard') }}">Administrador</a> >
      <a href="{{ route('buys.index') }}">Compras</a>
      <div class="back-link">
        <a href="{{ route('buys.index') }}" class="btn btn-danger my-3 float-left"><i class="fas fa-backward"></i> Regrezar</a>
      </div>
    </div>
  </div>
</div>
<!-- Page info end -->

<!-- section -->
<section class="product-section">
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-3">
            <label for="nameAdmin">Compra generada por:</label>
            <input type="text" value="{{ $userXadmin[0]->name }}" id="nameAdmin" class="form-control" disabled>
          </div>
          <div class="col-3">
            <label for="cost">Costo de la compra:</label>
            <input type="text" id="cost" class="form-control" value="${{ $buy->cost_com }}" disabled>
          </div>
          <div class="col-3">
            <label for="provider">Proveedor:</label>
            <input type="text" id="provider" class="form-control" value="{{ $provider[0]->nameProvider }}" disabled>
          </div>
          <div class="col-3">
            <label for="provider">Fecha de compra:</label>
            <input type="text" id="provider" class="form-control" value="{{ $buy->updated_at }}" disabled>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col">
            <label for="concepto_compra">Concepto de la compra: </label>
            <textarea name="concepto_compra" id="concepto_compra" rows="3" class="form-control" disabled>{{ $buy->concepto_compra }}</textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            @php
            $count = 1;
            @endphp
            @foreach ($details as $detail)
            @if ($detail->cantidad_com != null)
            <div class="row border-bottom my-2 pb-2">
              <div class="col-1">
                <label for="id{{ $count }}" class="menos">#</label>
                <input id="id{{ $count }}" type="number" value="{{ $count }}" class="form-control id-controlo" disabled>
                @php
                $count++;
                @endphp
              </div>
              <div class="col-4">
                <label for="quant">Cantidad: </label>
                <input type="number" class="form-control" value="{{ $detail->cantidad_com }}" disabled>
              </div>
              <div class="col-7">
                @php
                $producto = DB::select('select * from products where id = ?', [$detail->product_id]);
                // dd($producto[0]->nameProduct);
                @endphp
                <label for="product">Producto: </label>
                <input type="text" class="form-control" value="{{ $producto[0]->nameProduct }}" disabled>
              </div>
            </div>
            @endif
            @endforeach
          </div>
          <div class="col-5">
            <div class="row ml-4">
              <div class="row mt-2">
                <label for="estado">Estado de la compra: </label>
                <input type="text" id="estado" class="form-control" value="{{ $status[0]->nameStatus }}" disabled>
              </div>
              <form action="{{ route('buys.status', $buy) }}" method="POST">
                <div class="form-group">
                  <div class="form-row mt-3">
                    <div class="col-6">
                      <span>Estado de la compra:</span>
                    </div>
                    <div class="col-6">
                      <select name="status_id" class="form-control custom-select">
                        @foreach ($buyStatus as $status)
                        <option value="{{ $status->id }}">{{ $status->nameStatus }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success btn-block mt-4">Actualizar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        @foreach ($details as $detail)
        @endforeach
      </div>
    </div>
  </div>

</section>
<!-- section end -->

@endsection
