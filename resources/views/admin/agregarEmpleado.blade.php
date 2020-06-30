@extends('plantillaAdmin')

@section('seccion')
<div class="container p-3">

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
    <!--Empleado creado correctamente-->
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    
    <h1>Agregar nuevo empleado</h1>
    <hr>
    <div class="text-center">
        <form action="{{ route('jefe.agregarEmpleadoPost') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre de usuario</label>
                    <input type="text" name="usuario" class="form-control" id="inputUsername" placeholder="Usuario">
                </div>
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" name="contrasenia" class="form-control" id="inputPassword" placeholder="Password">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="ejemplo@dirección.com">
                </div>
            </div>
            <h3 class="text-left">Datos personales</h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="inputName" placeholder="Nombre" value="{{ old('nombre') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Apellido</label>
                    <input type="text" name="apellido" class="form-control" id="inputLastName" placeholder="Apellido" value="{{ old('apellido') }}">
                </div>
            </div>    
            <div class="text-center">
                <button type="submit" id="crearCuentaButton" class="btn btn-primary marginButton btn-lg active">Crear cuenta</button>
            </div>
        </form>
    </div>
</div>
@endsection