@extends('layouts.app')
@section('title', 'Producto')

@section('content')

<!-- Page info -->
<div class="page-top-info">
  <div class="container">
    <h4>Detalles del proveedor:</h4>
    <div class="site-pagination">
      <a href="{{ route('dashboard') }}">Administrador</a> >
      <a href="{{ route('providers.index') }}">Proveedores</a>
      <div class="back-link">
        <a href="{{ route('providers.index') }}" class="btn btn-danger my-3 float-left"><i class="fas fa-backward"></i> Regrezar</a>
        <a href="{{ route('providers.edit', $provider) }}" class="btn btn-sm btn-warning float-right my-3 mx-2">Editar</a>
        <form action="{{ route('providers.delete', $provider) }}" method="POST">
          @method('put')
          @csrf
          <button class="btn btn-sm btn-danger float-right my-3 mx-2">
            @if($provider->status !=1)
            Activar
            @else
            Eliminar
            @endif
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Page info end -->

<!-- product section -->
<section class="product-section">
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-6 offset-3">
            <p class="text-bold">
              Nombre: <span>{{ $provider->nameProvider }}</span><br />
              Apellido paterno: <span>{{ $provider->apProvider }}</span><br />
              Apellido materno: <span>{{ $provider->amProvider }}</span><br />
              Correo electrónico: <span>{{ $provider->emailProvider }}</span><br />
              Número telefónico: <span>{{ $provider->phone }}</span><br />
              Compañía: <span>{{ $provider->companyProvider }}</span><br />
              RFC: <span>{{ $provider->rfcProvider }}</span><br />
              Descripción: <span>{{ $provider->descriptionProvider }}</span><br />
              Estado: <span>
                @if ($provider->status == 1)
                Activo
                @else
                Eliminado
                @endif
              </span><br />
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- product section end -->


@endsection
