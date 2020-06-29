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
    <!--Registro de compra exitosa-->
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    @if (session('mensajeErrorStock'))
        <div class="alert alert-danger">
            {{ session('mensajeErrorStock') }}
        </div>
    @endif


    <h2 class="pb-3 pt-5">Registrar venta</h1>
    <form id="actionLabel" method="POST" action="{{ action('empleadoController@registrarCompraPost') }}">
    <label for="actionLabel">Seleccione el producto que ha sido vendido en el local e indique su cantidad</label>
    @method('PUT')
    @csrf
        <select name="idProducto" class="form-control form-control-sm" >
            @foreach($productosNoVenta as $item)         
            <option value="{{$item->id_producto}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="cantidadCompra" class="custom-control-input" value="1" checked>
                    <label class="custom-control-label" for="customRadioInline1">1</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="cantidadCompra" class="custom-control-input" value="2">
                    <label class="custom-control-label" for="customRadioInline2">2</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline3" name="cantidadCompra" class="custom-control-input" value="3">
                    <label class="custom-control-label" for="customRadioInline3">3</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline4" name="cantidadCompra" class="custom-control-input" value="4">
                    <label class="custom-control-label" for="customRadioInline4">4</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline5" name="cantidadCompra" class="custom-control-input" value="5">
                    <label class="custom-control-label" for="customRadioInline5">5</label>
                </div>
        <input type="submit" value="Aceptar"/>
    </form>
</div>
@endsection