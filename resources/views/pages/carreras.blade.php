@extends('layouts.main')
@section('content')
    <main>
        <div class="container espacio" id="carreras">
            <div class="row bg-secondary text-white text-center rounded-top">
                <h1>Nuestras carreras</h1>
            </div>
            <div class="row justify-content-between text-center bg-secondary">
                
                <div class="col ">
                    <a href="/preinscripcion">
                        <div class="card h-100 p-3 shadow" style="width: 14rem;">
                            <img src="{{ asset('img/AF2.png') }}" class="card-img-top" alt="Analista Funcional">
                            <div class="card-body ">
                                <a href="#" class="btn btn-primary mt-2">Inscribirse</a>
                                <a href="#" class="btn btn-primary mt-2">Lista de espera</a>
                                <p class="card-text">AQUI DEBERIA IR AMBOS BOTONES, DE CUPOS DISPONIBLE O LISTA ESPERA</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col justify-content-center">
                    <a href="/preinscripcion">
                        <div class="card h-100 p-3 shadow" style="width: 14rem;">
                            <img src="{{ asset('img/ITI2.png') }}" class="card-img-top" alt="Infraestructura TI">
                            <div class="card-body">
                                <a href="#" class="btn btn-danger text-white mt-2 mt-2">Inscribirse</a>
                                <a href="#" class="btn btn-danger text-white mt-2 mt-2">Lista de espera</a>
                                <p class="card-text">AQUI DEBERIA IR LOS BOTONES DE CUPOS DISPONIBLE O LISTA ESPERA</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col justify-content-center ">
                    <a href="/preinscripcion">
                        <div class="card h-100 p-3 shadow" style="width: 14rem;">
                            <img src="{{ asset('img/DS2.png') }}" class="card-img-top " alt="Desarrollo de software">
                            <div class="card-body ">                                
                                <a href="#" class="btn btn-success text-white mt-2">Inscribirse</a>
                                <a href="#" class="btn btn-success text-white mt-2">Lista de espera</a>
                                <p class="card-text">AQUI DEBERIA IR LOS BOTONES DE CUPOS DISPONIBLE O LISTA ESPERA</p>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
            
        </div>