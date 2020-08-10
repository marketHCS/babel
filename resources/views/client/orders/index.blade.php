@extends('layouts.app')
@section('title','Mis ordenes')

@section('content')
<section id="section-users">
  <div class="container">
    <div class="row">
    </div>
    <div class="row">
      <div class="col">
        @if (count($orders) == 0)
        <h4 class="text-center">
          No tienes compras aún para mostrar aquí. 🥺
        </h4>
        <a href="{{ route('index') }}" class="site-btn submit-order-btn mt-4">¿Quiéres ir de comras?</a>
        @else
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Fecha</th>
              <th>Estado</th>
              <th>Monto</th>
              <th>Recibo</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $sell)
            @php
            $status = DB::select('select nameStatus from buystatus where id = ?', [$sell->status_id]);
            $ticket = DB::select('select * from tickets where sell_id = ?', [$sell->id]);
            @endphp
            <tr>
              <td>{{ $sell->id }}</td>
              <td>{{ $sell->updated_at }}</td>
              <td class="underline">{{ $status[0]->nameStatus }}</td>
              <td>${{ $sell->monto_pago }}</td>
              <td><a href="{{ $ticket[0]->url }}" target=”_blank”>Ticket</a></td>
              <td><a href="{{ route('orders.show', $sell) }}" class="btn btn-sm btn-success">Detalles</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $orders->links() }}
        @endif
      </div>
    </div>
  </div>
</section>
@endsection
