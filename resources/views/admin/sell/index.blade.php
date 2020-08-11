@extends('layouts.app')
@section('title','Ventas')

@section('content')
<section id="section-users">
  <div class="container">
    <div class="row">
    </div>
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Monto</th>
            <th>Cliente</th>
            <th>Recibo</th>
            <th>Factura</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sells as $sell)
          @php
          // dd($buy);
          // use App\User;
          $user = DB::select('select * from users where id = ?', [$sell->user_id]);
          // $users = User::find($sell->user_id);
          // dd($userXadmin);
          // dd($users);
          $status = DB::select('select nameStatus from buystatus where id = ?', [$sell->status_id]);
          $ticket = DB::select('select * from tickets where sell_id = ?', [$sell->id]);
          @endphp
          <tr>
            <td>{{ $sell->id }}</td>
            <td>{{ $sell->updated_at }}</td>
            <td class="underline">{{ $status[0]->nameStatus }}</td>
            <td>${{ $sell->monto_pago }}</td>
            <td><a href="{{ route('users.show', $user[0]->id) }}"> {{ $user[0]->email }} </a></td>
            @if ($sell->status_id != 3 && $sell->status_id != 4)
            <td><a href="{{ $ticket[0]->url }}" target=”_blank”>Ticket</a></td>
            <td><a href="{{ route('factures.download', $sell) }}" target=”_blank”>Factura</a></td>
            @else
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            @endif
            <td><a href="{{ route('sells.show', $sell) }}" class="btn btn-sm btn-success">Detalles</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $sells->links() }}
    </div>
  </div>
</section>
@endsection
