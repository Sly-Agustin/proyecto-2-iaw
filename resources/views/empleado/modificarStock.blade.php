@extends('plantillaEmpleado')

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
    <h1 class="">Modificación de productos</h1>
    <hr>
    <h2 class="pt-2 pb-3">Actualizar stock de un producto</h1>
    <form id="actionLabel" method="POST" action="{{ action('empleadoController@modificarStockPost') }}">
    <label for="actionLabel">Seleccione un producto para actualizar su stock, puede ir tecleando el nombre del producto para que el menú lo lleve al mismo</label>
    @method('PUT')
    @csrf
        <select name="idProducto" class="form-control form-control-sm" >
            @foreach($productos as $item)         
            <option value="{{$item->id_producto}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <div class="form-group col-md-3">
            <label class="pt-3" for="inputStock">Nuevo stock: </label>
            <input type="number" name="nuevoStock" class="form-control" id="inputStock" placeholder="Ej: 100" value="{{ old('nuevoStock') }}">
        </div>
        <input type="submit" value="Actualizar stock"/>
    </form>

    <h2 class="pb-3 pt-5">Quitar producto de la venta</h1>
    <form id="actionLabel" method="POST" action="{{ action('empleadoController@quitarProductoPost') }}">
    <label for="actionLabel">Seleccione un producto para quitarlo de la lista de productos y la venta, puede ir tecleando el nombre del producto para que el menú lo lleve al mismo</label>
    @method('PUT')
    @csrf
        <select name="idProducto" class="form-control form-control-sm" >
            @foreach($productosNoVenta as $item)         
            <option value="{{$item->id_producto}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        
        <input type="submit" value="Quitar"/>
    </form>

    <h2 class="pb-3 pt-5">Volver a poner producto en venta</h1>
    <form id="actionLabel" method="POST" action="{{ action('empleadoController@agregarProductoVentaPost') }}">
    <label for="actionLabel">Vuelve a poner un producto que haya sido sacado de la venta/lista al público</label>
    @method('PUT')
    @csrf
        <select name="idProducto" class="form-control form-control-sm" >
            @foreach($productosVenta as $item)         
            <option value="{{$item->id_producto}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        
        <input type="submit" value="Agregar de nuevo"/>
    </form>
</div>
@endsection