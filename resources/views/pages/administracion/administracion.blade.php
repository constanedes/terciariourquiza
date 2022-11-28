@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-2 bg-dark">
            <ul class="nav nav-pills flex-column text-white" style="padding-top: 30px;">
                <li class="nav-item">
                    <a href="/administracion/carreras" class="nav-link text-white">
                        Carreras
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/administracion/estudiantes" class="nav-link text-white">
                        Estudiantes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/administracion/ingresantes" class="nav-link text-white">
                        Ingresantes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/administracion/listaespera" class="nav-link text-white">
                        Lista de espera
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/administracion/turnos" class="nav-link text-white">
                        Turnos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/administracion/configuraciones" class="nav-link text-white">
                        Configuraciones
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/administracion/users" class="nav-link text-white">
                        Users
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-10">
            @yield('page')
        </div>
    </div>
</div>

@stop