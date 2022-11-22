@include('modals.login') @include('layouts.navScript') @section('nav')

<header>
    @yield('login')
    <div>
        <div class="container-fluid mb-3 ">
            <div class="row">
                <div class="col-md">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-secondary fixed-top">
                        <a class="navbar-brand" href="/">
                            <img src="{{ asset('img/Logo_Terciario_Urquiza.png') }}" alt="Escuela Urquiza" width="60"
                                height="60" data-aos="fade-up" data-aos-anchor-placement="bottom-center" />
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                            data-bs-target="#menuNavegacion">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="menuNavegacion" class="collapse navbar-collapse">
                            <ul class="navbar-nav ms-3">
                                <li class="nav-item ms-3">
                                    <a class="nav-link" href="/">Inicio</a>
                                </li>
                                <li class="nav-item ms-3">
                                    <a class="nav-link" href="/nosotros">Sobre nosotros</a>
                                </li>
                                <!-- <li class="nav-item ms-3 "><a class="nav-link" href="#">Tramites</a></li> -->

                                <li class="nav-item dropdown ms-3">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown">
                                        Nuestras carreras
                                    </a>
                                    <ul id="carrerasUl" class="dropdown-menu"></ul>

                                    <a id="iniciar-sesion2" class="nav-link text-nowrap " href="/login">Iniciar
                                        Sesión</a>
                                </li>
                                @hasanyrole('bedelia|Super Admin')
                                <li class="nav-item ms-3">
                                    <a class="nav-link" href="/administracion/estudiantes">Administración</a>
                                </li>
                                @endhasanyrole
                            </ul>
                        </div>
                        @hasanyrole('bedelia|Super Admin|student')
                        @hasrole('student')
                        @endhasrole
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <button type="button" class="btn btn-warning">
                                Cerrar Sesión
                            </button>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                            {{ csrf_field() }}
                        </form>
                        @else @if($provider['inscription']->value == 1)
                        <a href="/preinscripcion">
                            <button type="button" class="btn btn-warning m-3" data-bs-toggle="modal">
                                Inscripcion {{$provider['inscription']->obs}}
                            </button>
                        </a>
                        @endif
                        <button type="button" class="btn btn-warning " data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Iniciar Sesión
                        </button>
                        @endhasanyrole
                    </nav>
                </div>
            </div>

        </div>
    </div>
</header>

@stop @yield('navScript')