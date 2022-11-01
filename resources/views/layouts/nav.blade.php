@include('modals.login')
@section('nav')

<header>
    @yield('login')
    <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom border-secondary fixed-top ">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="{{ asset('img/Logo_Terciario_Urquiza.png') }}" alt="Escuela Urquiza" width="60"
                        height="60">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menuNavegacion">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="menuNavegacion" class="collapse navbar-collapse ">
                    <ul class="navbar-nav ms-3">

                        <li class="nav-item ms-3"><a class="nav-link" href="../index.php">Inicio</a></li>
                        <li class="nav-item ms-3"><a class="nav-link" href="/nosotros">Sobre nosotros</a></li>
                        <!-- <li class="nav-item ms-3 "><a class="nav-link" href="#">Tramites</a></li> -->

                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Nuestras carreras
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/analisis-funcional">Análisis Funcional de Sistemas
                                        Informáticos</a>
                                </li>
                                <li><a class="dropdown-item" href="/infraestructura-ti">Infraestructura de Tecnología de
                                        la
                                        Información</a></li>
                                <li><a class="dropdown-item" href="/desarrollo-software">Desarrollo de Software</a></li>
                            </ul>
                            <a id="iniciar-sesion2" class="nav-link text-nowrap" href="/login">Iniciar Sesión</a>
                        </li>
                        @hasanyrole('bedelia|Super Admin')
                        <li class="nav-item ms-3"><a class="nav-link"
                                href="/administracion/estudiantes">Administración</a></li>
                        @endhasanyrole
                    </ul>
                </div>
                @hasanyrole('bedelia|Super Admin|student')
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <button type="button" class="btn btn-primary">
                        Cerrar Sesión
                    </button>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @else
                <a href="/carreras">
                    <button type="button" class="btn btn-warning m-3" data-bs-toggle="modal">
                        Inscripcion @php echo(date("Y")+1) @endphp
                    </button>
                </a>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Iniciar Sesión
                </button>
                @endhasanyrole
            </div>
        </nav>
    </div>
</header>
@stop