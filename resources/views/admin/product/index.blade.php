@extends('layouts.app')
@section('title', 'Productos')

@section('content')
<section id="section-products">
  <div class="container">
    <div class="row">
      <a href="{{ route('products.create') }}" class="btn btn-success mb-5 float-right ml-auto"><i class="fas fa-tshirt"></i> Crear product</a>
    </div>
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
          <th scope="col">#</th>
          <th scope="col">Estado</th>
          <th scope="col">Nombre</th>
          <th scope="col">Precio</th>
          <th scope="col">Existencia QRO</th>
          <th scope="col">Existencia CDMX</th>
          <th scope="col">Existencia GDL</th>
          <th colspan="2">&nbsp;</th>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            <td scope="row">{{ $product->id }}</td>
            <td>
              @php
              $queryStatus = DB::select('select nameStatus from products join statusproducts s on products.statusProduct_id = s.id where products.id = ?', [$product->id]);
              // dd($query)
              @endphp
              {{ $queryStatus[0]->nameStatus }}
            </td>
            <td>{{ $product->nameProduct}}</td>
            <td>{{ $product->precio_prod }}</td>
            <td>
              @php
              $queryExistenciaQRO = DB::select('select eq_s, eq_m, eq_g from inventories join products p on inventories.product_id = p.id where p.id = ?', [$product->id]);
              @endphp
              {{ $queryExistenciaQRO[0]->eq_s + $queryExistenciaQRO[0]->eq_m + $queryExistenciaQRO[0]->eq_g }}
            </td>
            <td>
              @php
              $queryExistenciaCDMX = DB::select('select ec_s, ec_m, ec_g from inventories join products p on inventories.product_id = p.id where p.id = ?', [$product->id]);
              @endphp
              {{ $queryExistenciaCDMX[0]->ec_s + $queryExistenciaCDMX[0]->ec_m + $queryExistenciaCDMX[0]->ec_g }}
            </td>
            <td>
              @php
              $queryExistenciaGDL = DB::select('select eg_s, eg_m, eg_g from inventories join products p on inventories.product_id = p.id where p.id = ?', [$product->id]);
              @endphp
              {{ $queryExistenciaGDL[0]->eg_s + $queryExistenciaGDL[0]->eg_m + $queryExistenciaGDL[0]->eg_g }}
            </td>
            <td>
              <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-success">
                Detalles
              </a>
            </td>
            <td>
              <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">
                Editar
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
