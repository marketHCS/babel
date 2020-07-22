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
          <th scope="col">Tipo</th>
          <th scope="col">Nombre</th>
          <th scope="col">email</th>
          <th scope="col">Sexo</th>
          <th colspan="3">&nbsp;</th>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td scope="row">{{ $user->id }}</td>
            <td>
              @if($user->typeUser_id == 1)
              <span>
                Cliente
              </span>
              @else
              <span class="underline">
                Admin
              </span>
              @endif
            </td>
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
            <td>
              <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-success">
                Detalles
              </a>
            </td>
            <td>
              <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">
                Editar
              </a>
            </td>
            <td>
              <a href="{{ route('users.destroy', $user) }}" class="btn btn-sm btn-danger" onclick="confirm('¿Seguro que quieres borrar este usuario...?')">
                Eliminar
              </a>
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
