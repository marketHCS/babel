<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="routename" content="{{ Route::currentRouteAction() }}">

  <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontAwesome.css') }}">
  <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/fe02ebbd3b.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">


  <!-- Icons -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('icons/android-chrome-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('icons/site.webmanifest') }}">
  <link rel="mask-icon" href="asset('icons/safari-pinned-tab.svg')" color="#f9dc3e">
  <meta name="msapplication-TileColor" content="#c49400">
  <meta name="msapplication-TileImage" content="{{ asset('icons/mstile-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">

</head>
<body id="app">
  {{-- <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div> --}}

  @php
  if (Session::has('cart')) {
  $cart = Session::get('cart');
  }
  @endphp



  @if (Request::url() != route('login') && Request::url() != route('register'))
  <!-- Header section -->
  <header class="header-section">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 text-center text-lg-left">
            <!-- logo -->
            <a href="{{ route('index') }}" class="site-logo my-auto">
              <img src="{{ asset('img/babel.svg') }}" alt="" class="babel-svg" />
            </a>
          </div>
          <div class="col-xl-3 col-lg-4">
            <form class="header-search-form centered">
              <input type="text" placeholder="Buscar en babel ...." />
              <button><i class="flaticon-search"></i></button>
            </form>
          </div>
          <div class="col-xl-7 col-lg-6">
            <div class="user-panel">
              @if(!Auth::User())
              <div class="up-item">
                <div class="row">
                  <i class="flaticon-profile"></i>
                  <a class="btn nav-item" href="{{ route('login') }}">Iniciar sesión</a>
                  <a class="btn nav-item" href="{{ route('register') }}">Registrarse</a>
                </div>
              </div>
              <div class="up-item">
                <div class="shopping-card">
                  <i class="flaticon-bag"></i>
                  @if(Session::has('cart'))
                  <span>{{ count($cart) }}</span>
                  @else
                  <span>0</span>
                  @endif
                </div>
                <a href="{{ route('cart') }}">Carrito de compras</a>
              </div>
              👕
              @else
              <div class="up-item">
                <div class="row">
                  <i class="flaticon-profile"></i>
                  <span class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('profile.show') }}">Mi perfil</a>
                      <a class="dropdown-item" href="{{ route('orders.index') }}">Mis compras</a>
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesión') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </div>
                  </span>
                </div>
              </div>
              <div class="up-item">
                <div class="shopping-card">
                  <i class="flaticon-bag"></i>
                  @if(Session::has('cart'))
                  <span>{{ count($cart) }}</span>
                  @else
                  <span>0</span>
                  @endif
                </div>
                <a href="{{ route('cart') }}">Carrito de compras</a>
              </div>
              @if(Auth::user()->typeUser_id == 2 || Auth::user()->typeUser_id == 3)
              <div class="up-item ml-4">
                <div class="row">
                  <span class="nav-item dropdown">
                    <a id="adminDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Administrador</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropdown">
                      <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                      <a class="dropdown-item" href="{{ route('users.index') }}">Usuarios</a>
                      <a class="dropdown-item" href="{{ route('categories.index') }}">Categorías</a>
                      <a class="dropdown-item" href="{{ route('providers.index') }}">Proveedores</a>
                      <a class="dropdown-item" href="{{ route('products.index') }}">Productos</a>
                      <a class="dropdown-item" href="{{ route('buys.index') }}">Compras</a>
                      <a class="dropdown-item" href="{{ route('sells.index') }}">Ventas</a>
                      </a>
                    </div>
                  </span>
                </div>
              </div>
              @endif
              👕
              @endif
            </div>
          </div>
        </div>
      </div>


      <nav class="main-navbar">
        <div class="container">
          <!-- menu -->
          <ul class="main-menu">
            <li><a href="{{ route('index') }}">Inicio</a></li>
            <li><a href="{{ route('product.index') }}">Todos los products</a></li>
            <li>
              <a href="#">
                Tee-shirts
                <span class="new">Nuevos</span>
              </a>
              <ul class="sub-menu">
                <li><a href="{{ route('product.boys') }}">Hombres</a></li>
                <li><a href="{{ route('product.girls') }}">Mujeres</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Categorías</a>
              <ul class="sub-menu">
                @php
                $categories = DB::select('select * from categories', []);
                // dd($categories);
                @endphp
                @foreach($categories as $category)
                <li><a href="{{ route('product.category', $category->id) }}">{{ $category->nameCategory }}</a></li>
                @endforeach
              </ul>
            </li>
          </ul>
        </div>
      </nav>



  </header>
  <!-- Header section end -->
  @endif

  <!-- Content -->
  @yield('content')
  <!-- Content end -->



  <!-- Footer section -->
  <section class="footer-section">
    <div class="container">
      <div class="footer-logo text-center">
        <a href="{{ route('index') }}"><img src="{{ asset('img/babel.svg') }}" alt="" class="babel-svg" /></a>
      </div>
      <div class="row spacing">
        <div class="col-lg-4 col-sm-6">
          <div class="footer-widget about-widget">
            <h2>Acerca de nosotros:</h2>
            <p>
              Somos una marca de playeras juveniles, trayendo únicos diseños
              llenos de estilo y personalidad.
            </p>
            <img src="{{ asset('img/cards.png') }}" alt="" />
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="footer-widget about-widget">
            <a href="#">
              <h2 class="footer-questions">¿Preguntas?</h2>
            </a>
            <ul>
              <li><a href="{{ route('about.us') }}">Acerca de nosotros</a></li>
              <li><a href="{{ route('shipping') }}">Envios</a></li>
              <li><a href="{{ route('support') }}">Atención al cliente</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="footer-widget contact-widget">
            <a href="{{ route('support') }}">
              <h2 class="footer-questions">Sucursales</h2>
            </a>
            <div class="con-info">
              <span>1. </span>
              <p><a href="{{ route('support') }}">Querétaro</a></p>
            </div>
            <div class="con-info">
              <span>2. </span>
              <p><a href="{{ route('support') }}">CDMX</a></p>
            </div>
            <div class="con-info">
              <span>3. </span>
              <p><a href="{{ route('support') }}">Guadalajara</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="social-links-warp">
      <div class="container">
        <p class="text-white text-center mt-5">
          Copyright &copy;
          <script>
            document.write(new Date().getFullYear());

          </script>
          All rights reserved <br>
          ⌨ con 💛 por
          <a href="" data-toggle="tooltip" data-placement="top" class="abstraction" title="O sea, el equipo de Vero y de Jama">Abstraction</a>
        </p>
      </div>
    </div>
  </section>

  @if($errors->any() || session('status') || session('message'))
  <div class="alert alert-danger notify alert-dismissible fade show mt-4 mx-4" role="alert" id="alert">
    @if(isset($message))
    <span class="bold">{{ Session::get('message') }}</span>
    @else
    {{ session('status') }}
    @endif
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif


  <!-- Scrips -->
  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  @if($errors->any())
  <script src="{{ asset('js/alerts.js') }}"></script>
  @endif

  <!-- Footer section end -->

</body>
</html>
