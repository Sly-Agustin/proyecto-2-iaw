@extends('plantillaEmpleado')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/containercss.css') }}">
@endsection

@section('seccion')
<title>Panel de control empleado</title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Empleado Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Estás logueado como {{Auth::user()->username}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <br>
    <h3>Operaciones:</h3>
    <br>
    <div class="row">
        <div class="col-md-6 col-lg-4 pb-3">
            <div class="card bg-transparent">
                <div class="card-body">
                    <h3 class="card-title">Modificar productos</h3>
                    <p>Modifica el stock de un producto, elimina un producto o agrega uno de nuevo a la lista que puede ver el público para explorar y/o comprar. No elimina los elementos de la base de datos en caso de quitarlos</p>
                    <div class="col text-center"><a class="btn btn-primary" href="{{route('empleado.modificarStock')}}" role="button">Modificar</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 pb-3">
            <div class="card bg-transparent">
                <div class="card-body">
                    <h3 class="card-title">Registrar venta</h3>
                    <p>Permite al empleado registrar una venta realizada en el lugar físico.</p>
                    <div class="col text-center"><a class="btn btn-primary" href="{{route('empleado.registrarCompra')}}" role="button">Registrar</a></div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection