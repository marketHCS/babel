@extends('layouts.app')
@section('title', 'Usuarios')

@section('content')
<section id="section-users">
  <div class="container">
    <div class="row">
    </div>
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">email</th>
          <th scope="col">Sexo</th>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td scope="row">{{ $user->id }}</td>
            <td>{{ $user->name . ' ' . $user->ap }}</td>
            <td>{{ $user->email }}</td>
            <td>
              @if($user->sex_id == 1)
              Masculino
              @elseif($user->sex_id == 2)
              Femenino
              @else
              Otro
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$users->links()}}
    </div>
  </div>
</section>
@endsection
