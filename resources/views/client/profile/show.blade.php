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

// dd($addresses)
// echo $addresses[0]->street;
@endphp

<!-- Page info -->
<div class="page-top-info">
  <div class="container">
    <h4>Detalles del usuario: </h4>
    <div class="site-pagination">
      <a href="{{ route('profile.show') }}">Mi perfil</a>
      <div class="back-link mt-2">
        <a href="{{ route('index') }}" class="btn btn-danger float-left"><i class="fas fa-backward"></i> Regrezar</a>
        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-warning float-right mx-2">Editar mi perfil</a>
      </div>
    </div>
  </div>
</div>
<!-- Page info end -->



<section class="product-section">
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="row no-gutters my-3">
          <div class="col-md-4">
            <img src="{{ $user->profilePicture }}" class="card-img show-profile-img">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h1 class="card-title my-auto">{{ $user->name . ' ' . $user->ap . ' ' . $user->am }}</h1>
              <div class="float-right mt-4">
                @if($user->typeUser_id == 1)
                <h3 class="underline">
                  Estado: Cliente
                </h3>
                @elseif($user->typeUser_id == 2)
                <h3 class="underline">
                  Estado: Admin
                </h3>
                @elseif($user->typeUser_id == 3)
                <h3 class="underline bold">
                  Estado: SuperAdmin
                </h3>
                @else
                <h3 class="underline text-muted">
                  Estado: Eliminado
                </h3>
                @endif
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-12 offset-lg-1">
            <h5 class="card-title">Informaci??n de usuario</h5>
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
                <span class="bold">Fecha de cumplea??os: </span><span class="text-muted underline">{{ $user->birthdate }}</span>
              </li>
              <li>
                <span class="bold">RFC: </span><span class="text-muted underline">{{ $user->rfc }}</span>
              </li>
              <li>
                <span class="bold">Sexo: </span><span class="text-muted underline">{{ $sexo }}</span>
              </li>
              <li>
                <span class="bold">N??mero de telefono: </span><span class="text-muted underline">{{ $user->phone }}</span>
              </li>
              <li>
                <span class="bold">Se uni?? el: </span><span class="text-muted underline">{{ $user->created_at }}</span>
              </li>
              <li>
                <span class="bold">Se modific?? el: </span><span class="text-muted underline">{{ $user->updated_at }}</span>
              </li>
            </ul>
          </div>
          <div class="col-lg-4 col-12 offset-lg-2 addresses">
            @php
            $count = 0;
            @endphp
            @if (count($addresses) != 0)
            @php
            $count++;
            @endphp
            <div class="row mb-2">
              <div class="col-5">
                <p>
                  <span class="bold mr-4">Direcci??n</span>
                </p>
                <p>
                  <a href="{{ route('client.address.edit') }}" class="btn btn-sm btn-warning mx-2">
                    Editar
                  </a>
                </p>
              </div>
              <div class="col-7">
                <ul>
                  <li><span class="bold">Calle: </span><span class="text-muted underline">{{ $addresses[0]->street }}</span></li>
                  <li><span class="bold">N. Exterior: </span><span class="text-muted underline">{{ $addresses[0]->exteriorNumberAddress }}</span></li>
                  <li><span class="bold">N. Interior: </span><span class="text-muted underline">{{ $addresses[0]->interiorNumberAddress }}</span></li>
                  <li><span class="bold">Colonia: </span><span class="text-muted underline">{{ $addresses[0]->suburb }}</span></li>
                  <li><span class="bold">C??digo Postal: </span><span class="text-muted underline">{{ $addresses[0]->cp }}</span></li>
                  <li><span class="bold">Ciudad: </span><span class="text-muted underline">{{ $addresses[0]->city }}</span></li>
                  <li><span class="bold">Estado: </span><span class="text-muted underline">{{ $addresses[0]->estate }}</span></li>
                </ul>
              </div>
              <div class="separated"></div>
            </div>
            @endif
          </div>
        </div>
        <div class="row my-3">
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
