@extends('plantillaAdmin')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/containercss.css') }}">
@endsection

@section('seccion')
<title>Panel de control jefe</title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">JEFE Dashboard</div>

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
                    <h3 class="card-title">Agregar productos</h3>
                    <p>Crea productos para que aparezcan en la lista de productos y puedan ser comprados por clientes</p>
                    <div class="col text-center"><a class="btn btn-primary" href="{{route('jefe.agregarProducto')}}" role="button">Agregar</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 pb-3">
            <div class="card bg-transparent">
                <div class="card-body">
                    <h3 class="card-title">Modificar productos</h3>
                    <p>Modifica el stock de un producto, elimina un producto o agrega uno de nuevo a la lista que puede ver el público para explorar y/o comprar. No elimina los elementos de la base de datos en caso de quitarlos</p>
                    <div class="col text-center"><a class="btn btn-primary" href="{{route('jefe.modificarStock')}}" role="button">Modificar</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 pb-3">
            <div class="card bg-transparent">
                <div class="card-body">
                    <h3 class="card-title">Agregar empleados</h3>
                    <p>Permite crear cuentas para los nuevos empleados.</p>
                    <div class="col text-center"><a class="btn btn-primary" href="{{route('jefe.agregarEmpleado')}}" role="button">Crear</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 pb-3">
            <div class="card bg-transparent">
                <div class="card-body">
                    <h3 class="card-title">Dar de alta/baja empleados</h3>
                    <p>Permite dar de baja una cuenta de empleado o volverla a habilitar.</p>
                    <div class="col text-center"><a class="btn btn-primary" href="#" role="button">Borrar</a></div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection