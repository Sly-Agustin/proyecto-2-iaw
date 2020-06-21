@extends('plantilla')

@section('seccion')
<hr class="hrNoBorder">
<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading text-center font-weight-bold">Categorias </div>
  <div class="list-group list-group-flush">
    <a href="#" class="list-group-item list-group-item-action bg-light">Procesadores</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Motherboards</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Memorias RAM</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Gabinetes</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Placas de video</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Refrigeración</a>
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

  
  </div>
    
 
    <div class="container-fluid">
        <h1 class="text-center">Lista completa de productos</h1>  
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $item)           
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->nombre}}</td>
                <td>{{$item->descripcion}}</td>
                <td>
                    <a href="{{route('productos.detallado', $item)}}">
                        {{$item->nombre}}
                    </a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>   
        {{ $productos->links() }} 
    </div>
</div>
<hr class="hrNoBorder">

@endsection