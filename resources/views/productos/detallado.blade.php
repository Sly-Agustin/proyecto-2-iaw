@extends('plantilla')

@section('seccion')
<div class="container">
    <h1>Página de producto detallado</h1>
    <h4>Nombre: {{$datos->nombre}}</h4>
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
    <a class="btn btn-primary" href="{{route('productos.comprar', $datos)}}" role="button">Comprar</a>
</div>
@endsection