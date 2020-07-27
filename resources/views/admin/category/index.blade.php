@extends('layouts.app')
@section('title','Categorías')

@section('content')

<section id="section-users">
  <div class="container">
    <div class="row">
      <a href="{{ route('categories.create') }}" class="btn btn-success mb-5 float-right ml-auto"><i class="fas fa-tshirt"></i> Crear categoría</a>
    </div>
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Estado</th>
            <th>Nombre</th>
            <th colspan="2">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td>
              @if ($category->status == 1)
              Activo
              @else
              Eliminado
              @endif
            </td>
            <td>{{ $category->nameCategory }}</td>
            <td><a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Editar</a></td>
            <td>
              <form action="{{ route('categories.delete', $category) }}" method="POST">
                @method('put')
                @csrf
                <button class="btn btn-sm btn-danger">
                  @if($category->status !=1)
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
      {{ $categories->links() }}
    </div>
  </div>
</section>
@endsection
