@extends('layouts.app')
@section('title', 'Editar usuario')

@section('content')
<div class="container">
  <a href="{{ route('users.show', $user->id) }}" class="btn btn-danger mt-5"><i class="fas fa-backward"></i> Regrezar</a>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Editar usuario
        </div>
        <div class="card-body">
          <form action="{{ route('users.update', $user) }}" method="POST">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4 col-sm-6">
                  <label for="name">Nombre: </label>
                  <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>
                <div class="col-md-4 col-sm-6">
                  <label for="ap">Apellido Paterno: </label>
                  <input type="text" name="ap" class="form-control" value="{{ old('ap', $user->ap) }}">
                </div>
                <div class="col-md-4 col-sm-6">
                  <label for="am">Apellido Materno: </label>
                  <input type="text" name="am" class="form-control" value="{{ old('am', $user->am) }}">
                </div>
              </div>
              <div class="form-group mt-2">
                <div class="form-row">
                  <div class="col-8">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" disabled>
                  </div>
                  <div class="col-4">
                    <label for="sex_id">Sexo:</label>
                    <select name="sex_id" id="sex_id" class="form-control custom-select" value="{{ old('sex_id', $user->sex_id) }}">
                      <option value="1">Masculino</option>
                      <option value="2">Femenino</option>
                      <option value="3">Otro</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group mt-2">
                <div class="form-row">
                  <div class="col-4">
                    <label for="rfc">RFC:</label>
                    <input type="text" name="rfc" class="form-control" value="{{ old('rfc', $user->rfc) }}">
                  </div>
                  <div class="col-4">
                    <label for="birthdate">Fecha de nacimiento:</label>
                    <input type="date" max="{{ date('Y-m-d') }}" value="{{ old('birthdate') }}" class="form-control">
                  </div>
                  <div class="col-4">
                    <label for="phone">Número de teléfono:</label>
                    <input type="number" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
                  </div>
                </div>
              </div>
              <div class="form-group mt-2">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
