<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontAwesome.css') }}">
</head>
<body id="app">
  <!-- Header section -->
  <header class="header-section">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 text-center text-lg-left">
            <!-- logo -->
            <a href="{{ route('home') }}" class="site-logo my-auto">
              <img src="{{ asset('img/babel.svg') }}" alt="" class="babel-svg" />
            </a>
          </div>
          <div class="col-xl-4 col-lg-5">
            <form class="header-search-form centered">
              <input type="text" placeholder="Buscar en babel ...." />
              <button><i class="flaticon-search"></i></button>
            </form>
          </div>
          <div class="col-xl-6 col-lg-5">
            <div class="user-panel">
              <div class="up-item">
                @guest
                <div class="row">
                  <i class="flaticon-profile"></i>
                  <a class="btn nav-item" href="{{ route('login') }}">Iniciar sesión</a>
                  @if (Route::has('register'))
                  <a class="btn nav-item" href="{{ route('register') }}">Registrarse</a>
                </div>
                @endif
                @else
                <div class="row">
                  <i class="flaticon-profile"></i>
                  <span class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </div>
                  </span>
                </div>
                @endguest
              </div>
              <div class="up-item">
                <div class="shopping-card">
                  <i class="flaticon-bag"></i>
                  <span>2</span>
                </div>
                <a href="#">Carrito de compras</a>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
    <nav class="main-navbar">
      <div class="container">
        <!-- menu -->
        <ul class="main-menu">
          <li><a href="#">Inicio</a></li>
          <li>
            <a href="#">
              Tee-shirts
              <span class="new">Nuevo</span>
            </a>
            <ul class="sub-menu">
              <li><a href="#">Hombres</a></li>
              <li><a href="#">Mujeres</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Pages (test)</a>
            <ul class="sub-menu">
              <li><a href="#">Product Page</a></li>
              <li><a href="#">Category Page</a></li>
              <li><a href="#">Cart Page</a></li>
              <li><a href="#">login</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Header section end -->


  <main class="py-4">
    @yield('content')
  </main>
</body>
</html>
