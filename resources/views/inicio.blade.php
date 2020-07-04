@extends('plantilla')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/containercss.css') }}">
@endsection

@section('seccion')
<div class="container text-white">
    <h1 class="text-center">Ofertas y novedades</h1>      
    <!--Poner un carousel de bootstrap con ofertas-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <iframe width="1231" height="692" src="https://www.youtube.com/embed/4kDHS4-pJUk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="carousel-caption d-none d-md-block">
                        <h5 >Descubrí la nueva MSI 2080!</h5>
                        <p>Disponible a la venta en nuestra página</p>
                    </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{url('/images/geforcertx.jpg')}}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-border">Encontra todo lo nuevo que las nuevas NVIDIA GTX pueden ofrecerte!</h5>
                    <p class="text-border">Solo en hardware store</p>
                </div>
            </div>
            <div class="carousel-item">
                <<img class="d-block w-100" src="{{url('/images/gaming.jpg')}}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-border">Encontra todo lo necesario para armar tu compu gamer!</h5>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endsection