@extends('welcome')
@section('head')
<header>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom border-secondary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo.jpg" alt="Escuela Urquiza" width="60" height="60">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menuNavegacion">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="menuNavegacion" class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-3">

                        <li class="nav-item ms-3"><a class="nav-link" href="../index.php">Inicio</a></li>
                        <li class="nav-item ms-3"><a class="nav-link" href="../nosotros.php">Sobre nosotros</a></li>
                        <li class="nav-item ms-3 "><a class="nav-link" href="#">Tramites</a></li>

                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Nuestras carreras
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../analisis-funcional.php">Análisis Funcional de Sistemas Informáticos</a>
                                </li>
                                <li><a class="dropdown-item" href="../infraestructura-ti.php">Infraestructura de Tecnología de la
                                        Información</a></li>
                                <li><a class="dropdown-item" href="../desarrollo-software.php">Desarrollo de Software</a></li>
                            </ul>
                            <a id="iniciar-sesion2" class="nav-link text-nowrap" href="../login.php">Iniciar Sesión</a>
                        </li>
                    </ul>
                </div>
                <a href="../login.php"><button id="iniciar-sesion" class="nav-link text-nowrap btn btn-primary text-light">Iniciar Sesión</button></a>
            </div>
        </nav>
    </div>
</header>
@stop