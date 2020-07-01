@extends('plantillaAdmin')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/containercss.css') }}">
@endsection
@section('seccion')
<title>Agregar producto</title>
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
    <!--Creacion de producto exitosa-->
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <h1>Agregar producto</h1>
    <div>
        <hr>
        <p>Aquí podrá agregar los productos para la página, por defecto los productos aparecerán a la venta aunque puede cambiarse más adelante. Los campos deben cumplir con las siguientes condiciones: </p>
        <p></p>
    </div>
    <div class="container containerBg borderRound">
        <p>Nombre: Obligatorio, cualquier combinación de caracteres</p>
        <p>Descripcion: Obligatoria, descripción básica del producto</p>
        <p>Tipo/categoria: Obligatoria, que es el producto en cuestión (procesador, memoria, motherboard, etc)</p>
        <p>URL del fabricante: Obligatoria, página oficial del producto</p>
        <p>Precio: Obligatorio, en pesos, debe ser un número positivo</p>
        <p>Stock: Obligatorio, se refiere a la cantidad de unidades disponibles, debe ser un número positivo o 0</p>
        <p>Especificaciones técnicas: Obligatorio, varían según el tipo de producto, por ejemplo frecuencia para las memorias RAM</p>
        <p>Imagen del producto: Opcional, elija una imagen desde su PC para subir como imagen ilustrativa del producto.</p>
    </div>
    <div class="text-center">
        <form action="{{route('jefe.agregarProductoPost')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre del producto</label>
                    <input type="text" name="productoNombre" class="form-control" id="inputName" placeholder="Nombre" value="{{ old('productoNombre') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Descripción del producto</label>
                    <input type="text" name="productoDescripcion" class="form-control" id="inputDescription" placeholder="Descripcion" value="{{ old('productoDescripcion') }}">
                </div>         
                <div class="form-group col-md-6">
                    <label>Tipo/Categoria</label>
                    <input type="text" name="productoTipo" class="form-control" id="inputType" placeholder="Procesador/Motherboard/etc" value="{{ old('productoTipo') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>URL del fabricante</label>
                    <input type="text" name="productoUrl" class="form-control" id="inputUrl" placeholder="URL" value="{{ old('productoUrl') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Precio</label>
                    <input type="number" name="productoPrecio" class="form-control" id="inputCost" placeholder="1500 (pesos)" value="{{ old('productoPrecio') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Stock disponible</label>
                    <input type="number" name="productoStock" class="form-control" id="inputStock" placeholder="100 (unidades)" value="{{ old('productoStock') }}">
                </div>
                <div class="form-group col-md-12">
                    <label>Especificaciones técnicas</label>
                    <textarea class="form-control" name="productoDescripcionLarga" id="inputLargeDescription" rows="3"></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="imagen">Imagen del producto</label>
                    <input type="file" name="imagen" class="px-2 py-2">
                    <div>{{ $errors->first('image') }}</div>
                </div>
                <div class="text-center">
                    <button type="submit" id="agregarProductoButton" class="btn btn-primary marginButton btn-lg active">Agregar producto</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection('seccion')