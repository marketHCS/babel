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
            @php
            $admins = DB::select('select * from users where typeUser_id between 2 and 3', []);
            // dd($admins);
            @endphp
            <th>#</th>
            <th>Monto</th>
            <th>Administrador</th>
            <th colspan="3">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($buys as $buy)
          @php
          // dd($buy);
          $userXadmin = DB::select('select * from users inner join administrators a on users.id = a.user_id where a.id = ?', [$buy->administrator_id]);
          // dd($userXadmin);
          @endphp
          <tr>
            <td>{{ $buy->id }}</td>
            <td>{{ $buy->cost_com }}</td>
            <td>{{ $userXadmin[0]->name }}</td>
            <td><a href="{{ route('buys.show', $buy) }}" class="btn btn-sm btn-success">Detalles</a></td>
            <td><a href="{{ route('buys.edit', $buy) }}" class="btn btn-sm btn-warning">Editar</a></td>
            <td>
              <form action="{{ route('buys.delete', $buy) }}" method="POST">
                @method('put')
                @csrf
                <button class="btn btn-sm btn-danger">
                  {{-- @if($buy->status !=1)
                  Activar
                  @else
                  Eliminar
                  @endif --}}
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $buys->links() }}
    </div>
  </div>
</section>
@endsection
