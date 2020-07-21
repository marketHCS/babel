@extends('layouts.app');
@section('title', 'Administrador')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <h2 class="my-4">FUTURA SECCIÓN DE DATA</h2>
  </div>
</div>

@if($errors->any())
<div class="alert alert-danger notify alert-dismissible fade show mt-4 mx-4" role="alert" id="alert">
  @if($message)
  {{ Session::get('message') }}
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
<script>
  const alertContainer = document.getElementById('alert');
  setTimeout(() => {
    alertContainer.classList.add('show');
  }, 1500);

  setTimeout(() => {
    alertContainer.classList.remove('show');
  }, 10000);

  console.log(alertContainer);

</script>
@endif


@endsection
