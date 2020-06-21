@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <h3 class="text-left">Datos personales</h3>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="inputName" placeholder="Nombre" value="{{ old('nombre') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Apellido</label>
                                <input type="text" name="apellido" class="form-control" id="inputLastName" placeholder="Apellido" value="{{ old('apellido') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Dirección</label>
                                <input type="text" name="direccion" class="form-control" id="inputAddress" placeholder="Ej: Calle falsa 123" value="{{ old('direccion') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputZip">Código Postal</label>
                                <input type="number" name="codigoPostal" class="form-control" id="inputZip" placeholder="Ej: 8000" value="{{ old('codigoPostal') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPhone">Teléfono</label>
                                <input type="number" name="telefono" class="form-control" id="inputPhone" placeholder="Ej: 0291 - 4567891" value="{{ old('telefono') }}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
