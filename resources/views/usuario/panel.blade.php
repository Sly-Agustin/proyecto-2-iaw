@extends('plantilla')
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/productoscss.css') }}">
@endsection
@section('seccion')
<div class="container">

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

    <!--Exito en agregar la tarjeta-->
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <h1 class="text-secondary">Panel de usuario de {{ $usuario->username }}</h1>
    <p class="text-white">Agregar tarjeta de crédito</p>
    <div class="text-center text-white">
        <form action="{{ route('usuario.tarjeta_agregada') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Banco</label>
                    <input type="text" name="bancoNombre" class="form-control" id="inputBank" placeholder="Nombre del banco">
                </div>
                <div class="form-group col-md-6">
                    <label>Número de tarjeta</label>
                    <input type="text" name="bancoNumero" class="form-control" id="inputBankNumber" placeholder="Ej: 8000 8000 8000 8000">
                </div>
                <div class="text-center">
                    <button type="submit" id="crearCuentaButton" class="verdeNeonButtonNoGlow rounded marginButton btn-lg active">Agregar tarjeta</button>
                </div>
            </div>
        </form>
    </div>
    <div class="text-white">
        <h2>Tarjetas actuales</h2>
        @if ($usuarioTarjetas->isEmpty())
            <p>No hay tarjetas registradas actualmente</p>
        @endif
        @foreach ($usuarioTarjetas as $tarj)
            <p>{{$tarj->banco}} {{$tarj->numero}}</p>
        @endforeach
    </div>
    <div class="text-white">
        <h2>Compras realizadas:</h2>
        @if ($usuarioCompras->isEmpty())
            <p>No tiene compras realizadas</p>
        @endif
        @foreach ($usuarioCompras as $compra)
            <p>Fecha: {{$compra->fechaCompra}}  -   Hardware comprado: {{$compra->nombre}}  -   Cantidad: {{$compra->cantidad}}.</p>
        @endforeach
    </div>
</div>
@endsection