@extends('layouts.main')
@section('content')
    <main>
        <div class="container espacio" id="carreras">
            <div class="row bg-secondary text-white text-center rounded-top">
                <h1>Nuestras carreras</h1>
            </div>
            <div class="row justify-content-evenly text-center">
                <div class="col"></div>
                <div class="col">
                    <a href="/preinscripcion">
                        <div class="card h-100" style="width: 14rem;">
                            <img src="{{ asset('img/AF2.svg') }}" class="card-img-top" alt="Analista Funcional">
                            <div class="card-body ">
                                <p class="card-text">AQUI DEBERIA IR AMBOS BOTONES, DE CUPOS DISPONIBLE O LISTA ESPERA</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col justify-content-center">
                    <a href="/preinscripcion">
                        <div class="card h-100" style="width: 14rem;">
                            <img src="{{ asset('img/ITI2.SVG') }}" class="card-img-top" alt="Infraestructura TI">
                            <div class="card-body">
                                <p class="card-text">AQUI DEBERIA IR LOS BOTONES DE CUPOS DISPONIBLE O LISTA ESPERA</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col justify-content-center">
                    <a href="/preinscripcion">
                        <div class="card h-100" style="width: 14rem;">
                            <img src="{{ asset('img/DS2.svg') }}" class="card-img-top" alt="Desarrollo de software">
                            <div class="card-body">
                                <p class="card-text">AQUI DEBERIA IR LOS BOTONES DE CUPOS DISPONIBLE O LISTA ESPERA</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col"></div>
            </div>
        </div>