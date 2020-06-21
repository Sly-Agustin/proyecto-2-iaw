@extends('plantilla')

@section('seccion')
<div class="container">
    <h1>Página resultado de creación de usuario</h1>
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
</div>
@endsection