@extends('plantilla')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/productoscss.css') }}">
@endsection

@section('seccion')
<div class="container text-white fontSize20">

    <!--Errores SQL-->
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    @if (session('mensajeError'))
        <div class="alert alert-danger">
            {{ session('mensajeError') }}
        </div>
    @endif

    <!--Errores de validación-->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="">Crear cuenta</h1>
    <p class="fontSize18">Para la creación de su cuenta se le pedirán ciertos datos personales, estos serán para la facturación en la compra de insumos y su respectivo envío. Ciertos datos como los detalles de la tarjeta de crédito pueden editarse una vez registrado.
    </p>
    <div class="text-center">
        <form action="{{ route('crearUsuario.result') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre de usuario</label>
                    <input type="text" name="usuario" class="form-control" id="inputUsername" placeholder="Usuario">
                </div>
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" name="contrasenia" class="form-control" id="inputPassword" placeholder="Password">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="ejemplo@dirección.com">
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
            <div class="text-center">
                <button type="submit" id="crearCuentaButton" class="verdeNeonButtonNoGlow rounded marginButton btn-lg active">Crear cuenta</button>
            </div>
        </form>
    </div>
</div>
@endsection('seccion')