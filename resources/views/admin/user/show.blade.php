@extends('layouts.app')
@section('title', $user->name)

@section('content')

@php
$sexo = 'Datos perdido...';
if ($user->sex_id == 1) {
$sexo = 'Masculino';
}elseif ($user->sex_id == 2) {
$sexo = 'Femenino';
}else {
$sexo = 'Otro';
}
@endphp

<section id="showUser">
  <div class="container">
    <div class="row">
      <div class="card">
        <div class="card-header">
          <div class="card-header-profile">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="{{ $user->profilePicture }}" class="card-img show-profile-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h1 class="card-title my-auto">{{ $user->name . ' ' . $user->ap . ' ' . $user->am }}</h1>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="card-body">
          <h5 class="card-title">Información de usuario</h5>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li>
                  <span class="bold">Nombre(s): </span><span class="text-muted underline">{{ $user->name }}</span>
                </li>
                <li>
                  <span class="bold">Apellido paterno: </span><span class="text-muted underline">{{ $user->ap }}</span>
                </li>
                <li>
                  <span class="bold">Apellido materno: </span><span class="text-muted underline">{{ $user->am }}</span>
                </li>
                <li>
                  <span class="bold">Email: </span><span class="text-muted underline">{{ $user->email }}</span>
                </li>
                <li>
                  <span class="bold">Fecha de cumpleaños: </span><span class="text-muted underline">{{ $user->birthdate }}</span>
                </li>
                <li>
                  <span class="bold">RFC: </span><span class="text-muted underline">{{ $user->rfc }}</span>
                </li>
                <li>
                  <span class="bold">Sexo: </span><span class="text-muted underline">{{ $sexo }}</span>
                </li>
                <li>
                  <span class="bold">Número de telefono: </span><span class="text-muted underline">{{ $user->phone_id }}</span>
                </li>
                <li>
                  <span class="bold">Se unió el: </span><span class="text-muted underline">{{ $user->created_at }}</span>
                </li>
                <li>
                  <span class="bold">Se modificó el: </span><span class="text-muted underline">{{ $user->updated_at }}</span>
                </li>
              </ul>
            </div>
            <div class="col-lg-6"></div>
          </div>
          <p class="card-text">Content</p>
        </div>
        <div class="card-footer">
          <a href="{{ route('users.destroy', $user) }}" class="btn btn-sm btn-danger float-right ml-2" onclick="confirm('¿Seguro que quieres borrar este usuario...?')">
            Eliminar
          </a>
          <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning float-right mx-2">
            Editar
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
