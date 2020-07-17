@extends('layouts.app')
@section('title', 'Registro')
@section('content')
<section id="login" class="section-login loginBG">
  <div class="container mt-4 mb-4 loginBG">
    <div class="row align-center">
      <div class="col">
        <div class="card central-card">
          <a href="{{ route('index') }}" class="central-card">
            <img src="{{ asset('img/babel.svg') }}" alt="Babel Logo" class="card-img-top babel-svg central-card" />
          </a>
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="form-group text-center mb-3">
                <h3>Registrarse</h3>
              </div>

              <div class="form-row">
                <div class="form-group toDown fluid">
                  <label for="name">Nombre(s):</label>
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Juan David" value="{{ old('name') }}" required autocomplete="name" autofocus />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6 biLeft">
                  <label for="ap">Apellido paterno:</label>
                  <input type="text" name="ap" id="ap" class="form-control @error('ap') is-invalid @enderror" placeholder="Rodriguez" value="{{ old('ap') }}" required autocomplete="family-name" />
                </div>
                <div class="form-group col-md-6 biRight">
                  <label for="am">Apellido materno:</label>
                  <input type="text" name="am" id="am" class="form-control @error('am') is-invalid @enderror" placeholder="Escamilla" value="{{ old('am') }}" required autocomplete="family-name" />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6 biLeft">
                  <label for="birthday">Fecha de nacimiento:</label>
                  <input type="date" name="birthday" id="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}" required autocomplete="bday-day" max="{{ date('d-m-Y') }}" />

                </div>
                <div class="form-group col-md-6 biRight">
                  <label for="sex">Sexo:</label>
                  <select class="custom-select mr-sm-2 @error('sex') is-invalid @enderror" name="sex" id="sex" value="{{ old('sex') }}" required>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">Otro</option>
                  </select>
                </div>
              </div>



              <div class="form-row">
                <div class="form-group toDown fluid">
                  <label for="email">Correo electrónico:</label>
                  <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="apolo@babel.rocks" value="{{ old('email') }}" required autocomplete="email" />
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6 biLeft">
                  <label for="password">Contraseña:</label>
                  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required />
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                </div>
                <div class="form-group col-md-6 biRight">
                  <label for="password-confirm">Repetir contraseña:</label>
                  <input type="password" name="password_confirmation" id="password-confirm" class="form-control @error('password-confirm') is-invalid @enderror" required />
                </div>
              </div>

              <div class="form-group row">
                <div class="col">
                  <input type="submit" name="submitFormLogin" id="submitFormLogin" class="btn toDown btn-babel float-right" value="Registrarse" />
                </div>
              </div>
            </form>
            <script>
              (function() {
                'use strict';
                window.addEventListener('load', function() {
                  var forms = document.getElementsByClassName('needs-validation');
                  var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                    }, false);
                  });
                }, false);
              })();

            </script>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
