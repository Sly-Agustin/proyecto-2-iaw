@extends('plantilla')

@section('seccion')
<div class="container textFont20 text-white">
<h1>Gracias por su compra de {{$array['numero']}}  {{$array['nombre']}}</h1>
<p>Para más detalles sobre su compra puede ir al panel de usuario</p>
@endsection