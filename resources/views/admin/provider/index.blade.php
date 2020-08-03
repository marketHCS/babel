@extends('layouts.app')
@section('title','Proveedores')

@section('content')

<section id="section-users">
  <div class="container">
    <div class="row">
      <a href="{{ route('providers.create') }}" class="btn btn-success mb-5 float-right ml-auto"><i class="fas fa-tshirt"></i> Crear proveedor</a>
    </div>
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Estado</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th colspan="3">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($providers as $provider)
          <tr>
            <td>{{ $provider->id }}</td>
            <td>
              @if ($provider->status == 1)
              Activo
              @else
              Eliminado
              @endif
            </td>
            <td>{{ $provider->nameProvider }}</td>
            <td>{{ $provider->emailProvider }}</td>
            <td><a href="{{ route('providers.show', $provider) }}" class="btn btn-sm btn-success">Detalles</a></td>
            <td><a href="{{ route('providers.edit', $provider) }}" class="btn btn-sm btn-warning">Editar</a></td>
            <td>
              <form action="{{ route('providers.delete', $provider) }}" method="POST">
                @method('put')
                @csrf
                <button class="btn btn-sm btn-danger">
                  @if($provider->status !=1)
                  Activar
                  @else
                  Eliminar
                  @endif
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $providers->links() }}
    </div>
  </div>
</section>
@endsection
