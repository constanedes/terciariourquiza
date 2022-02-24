<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!--<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
-->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ICON  -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Escuela Urquiza</title>
    </head>
    <body class="antialiased">
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
        <footer>
            <script src="{{ asset('js/app.js') }}" ></script>
        </footer>
    </body>
</html>