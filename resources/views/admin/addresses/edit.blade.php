@extends('layouts.app')
@section('title', 'Editar dirección')

@section('content')
<div class="container">
  <a href="{{ route('users.show', $address->user_id) }}" class="btn btn-danger mt-5"><i class="fas fa-backward"></i> Regrezar</a>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Editar dirección</div>
        <div class="card-body">
          <form action="{{ route('addresses.update', $address) }}" method="POST">
            <div class="form-group">
              <label for="cp">*Codigo postal</label>
              <div class="form-row">
                <div class="col">
                  <input type="number" name="cp" id="cp" class="form-control" value="{{ old('cp', $address->cp) }}" />
                </div>
                <div class="col">
                  <a class="btn btn-success float-right" id="buttonVerification">Comprobar código postal</a>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-4">
                  <label for="estate">Estado</label>
                  <div id="estateId">
                    <select name="estate" id="estate" class="form-control custom-select" disabled>
                      <option value="{{ old('estate', $address->estate) }}">{{ old('estate', $address->estate) }}</option>
                    </select>
                  </div>
                </div>
                <div class="col-4">
                  <label for="city">Ciudad o municipio</label>
                  <div id="cityId">
                    <select name="city" id="city" class="form-control custom-select" disabled>
                      <option value="{{ old('city', $address->city) }}">{{ old('city', $address->city) }}</option>
                    </select>
                  </div>
                </div>
                <div class="col-4">
                  <label for="interiorNumberAddress">Colonia</label>
                  <div id="suburbId">
                    <select name="suburb" id="suburb" class="form-control custom-select" disabled>
                      <option value="{{ old('suburb', $address->suburb) }}">{{ old('suburb', $address->suburb) }}</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="street">Calle</label>
              <div id="streetId">
                <input type="text" name="street" id="street" class="form-control" value="{{ old('street', $address->street) }}" disabled />
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-6">
                  <label for="exteriorNumberAddress">Número exterior</label>
                  <div id="exteriorNumberAddressId">
                    <input type="number" name="exteriorNumberAddress" id="exteriorNumberAddress" class="form-control" value="{{ old('exteriorNumberAddress', $address->exteriorNumberAddress) }}" disabled />
                  </div>
                </div>
                <div class="col-6">
                  <label for="interiorNumberAddress">Número interior</label>
                  <div id="interiorNumberAddressId">
                    <input type="number" name="interiorNumberAddress" id="interiorNumberAddress" class="form-control" value="{{ old('interiorNumberAddress', $address->interiorNumberAddress) }}" aria-describedby="helper" disabled />
                    <small id="helper" class="form-text text-muted">
                      En caso de no poseer, dejar el campo en valor 0.
                    </small>

                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              @csrf
              @method('PUT')
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<script src="{{ asset('js/addressVerification.js') }}"></script>
@endsection
