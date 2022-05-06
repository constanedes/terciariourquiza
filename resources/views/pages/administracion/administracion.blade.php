@extends('layouts.main')
@section('content')
    <div class="row">
    <div class="col-2 bg-dark">
        <ul class="nav nav-pills flex-column text-white">
            <li class="nav-item">
                <a href="/administracion/estudiantes" class="nav-link text-white">
                    Estudiantes
                </a>
            <li class="nav-item">
                <a href="hola" class="nav-link text-white">
                    pep
                </a>
            </li>
            <li class="nav-item">
                <a href="hola" class="nav-link text-white">
                    pep
                </a>
            </li>
        </ul>
    </div>
    <div class="col-10">
        @yield('page')
    </div>
</div>
@stop