@extends('plantilla')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/botonescss.css') }}">
<link rel="stylesheet" href="{{ asset('css/neoncss.css') }}">
<link rel="stylesheet" href="{{ asset('css/productoscss.css') }}">
@endsection

@section('seccion')
<div class="container fontSize20">

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
    @if (session('mensajeErrorStock'))
        <div class="alert alert-danger">
            {{ session('mensajeErrorStock') }}
        </div>
    @endif
    
    <div class="d-flex flex-row text-white fontSize20">
        <div class="container-fluid">
            <p>Seleccione la tarjeta a utilizar para la compra</p>
        </div>
        <div class="container-fluid">
            <select class="form-control form-control-sm">
            @foreach ($datosTodasTarjetas as $tarjet)
                <option>{{$tarjet->banco}}, {{$tarjet->numero}}</option>
            @endforeach
            </select>
        </div>
    </div>

    <div class="d-flex flex-row text-white" id="wrapper">
        <div class="container-fluid">
            <p class="text-left">Seleccione la cantidad a comprar de {{$datos->nombre}}</p>
            
        </div>


        <div class="container-fluid">
            <!--<form action="{{ action('productoController@compradoPost', $datos->id_producto) }}" method="POST">-->
            <form action="{{ action('productoController@compradoPost', $datos->id_producto) }}" method="POST">
            @csrf
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="cantidadCompra" class="custom-control-input" value="1" checked>
                    <label class="custom-control-label" for="customRadioInline1">1</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="cantidadCompra" class="custom-control-input" value="2">
                    <label class="custom-control-label" for="customRadioInline2">2</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline3" name="cantidadCompra" class="custom-control-input" value="3">
                    <label class="custom-control-label" for="customRadioInline3">3</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline4" name="cantidadCompra" class="custom-control-input" value="4">
                    <label class="custom-control-label" for="customRadioInline4">4</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline5" name="cantidadCompra" class="custom-control-input" value="5">
                    <label class="custom-control-label" for="customRadioInline5">5</label>
                </div>
                @if ($datosTodasTarjetas->isEmpty())
                <div class="text-center"><p>No puede realizarse la compra si no tiene tarjetas asociadas a la cuenta</p></div>
                @else
                <div class="text-center">
                    <button type="submit" id="comprarButton" class="verdeNeonButton rounded marginButton btn-lg active">Comprar</button>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection

@section('imports')
<script type="text/javascript" src="{{ URL::asset('js/botonesjs.js') }}"></script>
@endsection