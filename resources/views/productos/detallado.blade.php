@extends('plantilla')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/neoncss.css') }}">
@endsection

@section('seccion')
<div class="container fontSize18 text-white">
    <h1 class="text-center">{{$datos->nombre}}</h4>
    <div class="text-center">
        @if ($datos->imagen!=null)
        <img src="data:image/png;base64,{{$datos->imagen}}" class="d-inline-block align-center" alt="{{$datos->nombre}}img">
        @else
        <p>No hay imagen del producto disponible</p>
        @endif
    </div>
    <p>Descripción: {{$datos->descripcion}}</p>
    <p>{{$datos->descripcionLarga}}</p>
    <p>Precio: ${{$datos->precio}}</p>
    <a class="verdeNeonButton rounded" href="{{route('productos.comprar', $datos)}}" role="button">Comprar</a>
</div>
@endsection