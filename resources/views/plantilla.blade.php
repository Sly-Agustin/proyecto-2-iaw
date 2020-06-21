<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    @yield('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/plantillacss.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body class="">   
    <nav id="header" class="navbar navbar-expand-sm bgHeader p-2 hdFtBg">
        <a class="navbar-brand" href="{{ route('inicio') }}"> <img width="100" height="60" id="joystick" src="{{url('/images/hardware.png')}}" class="d-inline-block align-center" alt="hardstoreimg"></a>
        <div class="collapse navbar-collapse p-2" id="navbarSupportedContent">
            <ul class="navbar-nav bd-navbar-nav flex-row">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inicio') }}">Home</a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="{{ route('productos') }}">Productos</a>
                </li>-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('productos') }}">Todos los productos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item bgLightBlueLight" href="#">Procesadores</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">AMD</a>
                        <a class="dropdown-item" href="#">Intel</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Motherboards</a>
                        <a class="dropdown-item" href="#">Memorias RAM</a>
                        <a class="dropdown-item" href="#">Gabinetes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item bgLightBlueLight" href="#">Placas de video</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Nvidia</a>
                        <a class="dropdown-item" href="#">Radeon</a>
                    </div>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('qs') }}">¿Quiénes somos?</a>
                </li>
                <li>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav flex-row ml-md-auto d-gone d-md-flex">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('crearUsuario') }}">Registrarse</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('crearUsuario') }}" class="btn btn-primary" role="button" aria-pressed="true">Registrarse</a>
            </li>
        </ul>
    </nav>

    @yield('seccion')
    <!--Footer-->
    <footer id="footer" class="footer hdFtBg" >
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="footerTitulo" id="contactoFooter">
                    <p>Contacto:</p>
                </div>
                <div class="footerFuente" id="telFooter">
                    Tel: 0291 456-6789
                </div>
                <div class="footerFuente" id="mailFooter">
                    hardware-store@gmail.com
                </div>
                <div class="footerFuente" id="dirFooter">
                    Caronti 456
                </div>
            </div>
            
            <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                <p>Seguinos en nuestras redes!</p>    
                <a class="navbar-link whiteColor" href="https://www.facebook.com/hardware-store" target="_blank" rel="noreferrer" aria-label="GitHub"><img width="60" id="facebook" src="{{url('images/facebook.png')}}" class="facebookImgInverted" alt="faceimg"></a> <!--El noreferrrer se utiliza por cuestiones de seguridad-->
                <a class="navbar-link whiteColor" href="https://twitter.com/hardware-store" target="_blank" rel="noreferrer" aria-label="GitHub"><img width="60" id="twitter" src="{{url('images/twitter.png')}}" class="twitterImgInverted" alt="twitimg"></a>
                <a class="navbar-link whiteColor" href="https://instagram.com/hardware-store" target="_blank" rel="noreferrer" aria-label="GitHub"><img width="60" id="instagram" src="{{url('images/instagram.png')}}" class="instagram" alt="instagramimg"></a>         
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 text-right">
                <div>Iconos diseñados por <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.es/" title="Flaticon">www.flaticon.es</a></div>
            </div>
        </div>
    </footer>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    @yield('imports')
  </body>
</html>