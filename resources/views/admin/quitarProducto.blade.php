@extends('plantillaAdmin')

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
    <!--Creacion de producto exitosa-->
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <h1 class="pb-5">Quitar producto de la venta</h1>
    <form id="actionLabel" method="POST" action="{{ action('adminController@quitarProductoPost') }}">
    <label for="actionLabel">Seleccione un producto para quitarlo de la lista de productos y la venta, puede ir tecleando el nombre del producto para que el menú lo lleve al mismo</label>
    @method('PUT')
    @csrf
        <select name="idProducto" class="form-control form-control-sm" >
            @foreach($productos as $item)         
            <option value="{{$item->id_producto}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        
        <input type="submit" value="Quitar"/>
    </form>
</div>
@endsection