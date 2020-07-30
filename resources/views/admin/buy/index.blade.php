@extends('layouts.app')
@section('title','Compras')

@section('content')
<section id="section-users">
  <div class="container">
    <div class="row">
      <a href="{{ route('buys.create') }}" class="btn btn-success mb-5 float-right ml-auto"><i class="fas fa-tshirt"></i> Nueva compra</a>
    </div>
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Monto</th>
            <th>Administrador</th>
            <th>Proveedor</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($buys as $buy)
          @php
          // dd($buy);
          $userXadmin = DB::select('select * from users inner join administrators a on users.id = a.user_id where a.id = ?', [$buy->administrator_id]);
          // dd($userXadmin);
          $provider = DB::select('select nameProvider from providers where id=?', [$buy->provider_id]);
          $status = DB::select('select nameStatus from buystatus where id = ?', [$buy->status_id]);
          @endphp
          <tr>
            <td>{{ $buy->id }}</td>
            <td>{{ $buy->updated_at }}</td>
            <td class="underline">{{ $status[0]->nameStatus }}</td>
            <td>${{ $buy->cost_com }}</td>
            <td>{{ $userXadmin[0]->name }}</td>
            <td>{{ $provider[0]->nameProvider }}</td>
            <td><a href="{{ route('buys.show', $buy) }}" class="btn btn-sm btn-success">Detalles</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $buys->links() }}
    </div>
  </div>
</section>
@endsection
