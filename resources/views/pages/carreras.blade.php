@extends('layouts.main')
@section('content')
<main>
    <div class="container espacio" id="carreras">
        <div class="row bg-secondary text-white text-center rounded-top">
            <h1>Nuestras carreras</h1>
        </div>
        <div class="row justify-content-evenly text-center">
            @foreach($carreras as $carrera)
            <div class="col justify-content-center">
                <a href="/preinscripcion">
                    <div class="card h-100" style="width: 14rem;">
                        <img src="{{asset('public/image/'.  $carrera->image) }}" class="card-img-top"
                            alt="Infraestructura TI">
                        <div class="card-body">
                            <div class="row">
                                <a class="btn btn-primary" href="{{'/preinscripcion/'.$carrera->id}}">
                                    @if($carrera->cupo > 0)
                                    Inscripcion
                                    @else
                                    Lista de espera
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>