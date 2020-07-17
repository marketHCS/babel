@extends('layouts.app')
@section('title', 'Iniciar sesión')
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
            <form method="POST" action="{{ route('login') }}">

              @csrf
              <div class="form-group text-center mb-3">
                <h3>Iniciar sesión</h3>
              </div>
              <div class="form-group toDown">
                <label for="email">Correo electrónico:</label>
                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="apolo@babel.com" value="{{ old('email') }}" required autocomplete="email" autofocus />

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group toDown">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group row">
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                      {{ __('Recuerdame') }}
                    </label>
                  </div>
                  @if (Route::has('password.request'))
                  <div class="form-group row">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('¿Olvidaste tu contraseña?') }}
                    </a>

                  </div>
                  <input type="submit" name="submitFormLogin" id="submitFormLogin" class="btn toDown btn-babel float-right" value="Iniciar sesión" />
                </div>
              </div>
              @endif


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
