@extends('plantillaAdmin')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/containercss.css') }}">
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

    <!---->
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif


    <h2 class="pb-3 pt-5">Dar de baja empleado</h1>
    <p>Los empleados que estén dados de baja no podrán realizar modificaciones a los productos</p>
    <form id="actionLabel" method="POST" action="{{ action('adminController@quitarEmpleadoPost') }}">
    <label for="actionLabel">Seleccione un producto para quitarlo de la lista de productos y la venta, puede ir tecleando el nombre del producto para que el menú lo lleve al mismo</label>
        @method('PUT')
        @csrf
        <select name="idEmpleado" class="form-control form-control-sm" >
            @foreach($empleadosEnActividad as $emp)         
            <option value="{{$emp->id_empleado}}">{{$emp->username}}</option>
            @endforeach
        </select>
            
        <input type="submit" value="Quitar"/>
    </form>


    <h2 class="pb-3 pt-5">Dar de alta empleado</h1>
    <p>Vuelve a habilitar a un empleado para realizar sus tareas habituales</p>
    <form id="actionLabel" method="POST" action="{{ action('adminController@habilitarEmpleadoPost') }}">
    <label for="actionLabel">Seleccione un producto para quitarlo de la lista de productos y la venta, puede ir tecleando el nombre del producto para que el menú lo lleve al mismo</label>
        @method('PUT')
        @csrf
        <select name="idEmpleado" class="form-control form-control-sm" >
            @foreach($empleadosNoEnActividad as $emp)         
            <option value="{{$emp->id_empleado}}">{{$emp->username}}</option>
            @endforeach
        </select>
            
        <input type="submit" value="Dar de alta"/>
    </form>
</div>
@endsection