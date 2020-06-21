@extends('plantilla')

@section('seccion')
<div class="container">
    <h1>Página de producto detallado</h1>
    <h4>Nombre: {{$datos->nombre}}</h4>
    <h4>Descripción: {{$datos->descripcion}}</h4>
    <p>{{$datos->descripcionLarga}}</p>
</div>
@endsection