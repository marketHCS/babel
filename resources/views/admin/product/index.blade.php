@extends('layouts.app')
@section('title', 'Productos')

@section('content')
<section id="section-products">
  <div class="container">
    <div class="row">
    </div>
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
          <th scope="col">#</th>
          <th scope="col">Estado</th>
          <th scope="col">Nombre</th>
          <th scope="col">Precio</th>
          <th colspan="2">&nbsp;</th>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            <td scope="row">{{ $product->id }}</td>
            <td>
              Est: {{ $product->statusProduct_id }}
            </td>
            <td>{{ $product->nameProduct}}</td>
            <td>{{ $product->precio_prod }}</td>
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
      {{$products->links()}}
    </div>
  </div>
</section>
@endsection
