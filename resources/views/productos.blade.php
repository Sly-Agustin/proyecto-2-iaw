@extends('plantilla')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/productoscss.css') }}">
@endsection

@section('seccion')
<!--Usado para los botones de compra-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<hr class="hrNoBorder">
<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-transparent border-right fontSize18 text-secondary" id="sidebar-wrapper">
  <div class="sidebar-heading text-center font-weight-bold">Categorias </div>
  <div class="list-group list-group-flush">
    <a href="#" class="list-group-item list-group-item-action bg-transparent border-secondary">Procesadores</a>
    <a href="#" class="list-group-item list-group-item-action bg-transparent border-secondary">Motherboards</a>
    <a href="#" class="list-group-item list-group-item-action bg-transparent border-secondary">Memorias RAM</a>
    <a href="#" class="list-group-item list-group-item-action bg-transparent border-secondary">Gabinetes</a>
    <a href="#" class="list-group-item list-group-item-action bg-transparent border-secondary">Placas de video</a>
    <a href="#" class="list-group-item list-group-item-action bg-transparent border-secondary">Refrigeración</a>
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

  
  </div>
    
 
    <div class="container-fluid fontSize18">
        <h1 class="text-center text-secondary">Lista completa de productos</h1>  
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Especificaciones</th>
                    <th scope="col">URL del fabricante</th>
                    <th scope="col">Stock disponible</th>
                    <th scope="col">Imagen</th>
                    @guest
                    @else
                    <th scope="col"></th>
                    @endguest
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $item)           
                <tr>
                <th scope="row">{{$item->id_producto}}</th>
                <td>{{$item->tipo}}</td>
                <td>{{$item->nombre}}</td>
                <td>{{$item->descripcion}}</td>
                <td>
                    <a href="{{route('productos.detallado', $item->id_producto)}}">
                        {{$item->nombre}}
                    </a>
                </td>
                <td>
                    <a href="{{$item->urlFabricante}}" target="_blank" rel="noreferrer">
                        Link
                    </a>
                </td>   
                <td>{{$item->stock}}</td>

                <!--Imágenes-->
                @if ($item->imagen!=null)
                <td><img width="100" height="60" src="data:image/png;base64,{{$item->imagen}}" class="d-inline-block align-center" alt="{{$item->nombre}}img"></td>
                @else
                <td>No hay imagen disponible</td>
                @endif

                <!--En caso de estar logueado habilitar el boton de compra-->
                @guest
                @else
                <td scope="col">
                    <a href="{{route('productos.comprar', $item)}}">
                        Comprar
                    </a>
                </td>
                @endguest
                </tr>

                
                @endforeach
            </tbody>
        </table>   
        {{ $productos->links() }} 
    </div>
</div>
<hr class="hrNoBorder">

@endsection