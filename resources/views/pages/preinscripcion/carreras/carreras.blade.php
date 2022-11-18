@include('pages.preinscripcion.carreras.jscripts')
@extends('layouts.main')
@section('content')
<main>
    <form method="post" action="/preinscripcion/enviar">
        <div class="container espacio" id="carreras">
            <div class="row text-center bg-secondary rounded-top">
                <h1 class="text-white bg-warning fw-bold">Seleccionar carrera</h1>
            </div>
            <div class="row justify-content-evenly text-center bg-secondary">
                @foreach($vars['carreras'] as $carrera)
                <div class="col d-flex justify-content-around ">
                    <div class="card h-100 border border-dark shadow-lg" style="width: 14rem;">
                        <img src="{{asset('image/'.  $carrera->image) }}" class="card-img-top "
                            alt="{{$carrera->career}} ">
                        <div class="card-body">
                            <div class="row">
                                <input carcup="{{$carrera->quota}}" id="{{$carrera->id}}" type="radio" class="btn-check"
                                    name="career" value="{{$carrera->id}}"
                                    onchange="{{'showTurns('.$carrera->quota.')'}}" required>
                                <label class="btn btn-secondary" for="{{$carrera->id}}">
                                    @if($carrera->quota > 0)
                                    Inscripcion
                                    @else
                                    Lista de espera
                                    @endif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <input type="hidden" name="typedoc" value="{{$vars['entrant']['typedoc']}}" />
            <input type="hidden" name="numdoc" value="{{$vars['entrant']['numdoc']}}" />
            <input type="hidden" name="name" value="{{$vars['entrant']['name']}}" />
            <input type="hidden" name="surname" value="{{$vars['entrant']['surname']}}" />
            <input type="hidden" name="email" value="{{$vars['entrant']['email']}}" />
            <input type="hidden" name="password" value="{{$vars['entrant']['password']}}" />
            <input type="hidden" name="phone" value="{{$vars['entrant']['phone']}}" />
            <input type="hidden" name="birthday" value="{{$vars['entrant']['birthday']}}" />
            <input type="hidden" name="address" value="{{$vars['entrant']['address']}}" />
            <input type="hidden" name="postalcode" value="{{$vars['entrant']['postalcode']}}" />
            <input type="hidden" name="province" value="{{$vars['entrant']['province']}}" />
            <input type="hidden" name="locality" value="{{$vars['entrant']['locality']}}" />
            <input type="hidden" name="nationality" value="{{$vars['entrant']['nationality']}}" />
            <input type="hidden" name="title" value="{{$vars['entrant']['title']}}" />
            <input type="hidden" name="yearofgraduation" value="{{$vars['entrant']['yearofgraduation']}}" />
            <input type="hidden" name="institution" value="{{$vars['entrant']['institution']}}" />
            @csrf
            <!-- Fecha turno -->
            <div class="row py-5 bg-secondary" id="turns">
                <div class="form-date col-md-6 pl-5 pr-5 ">
                    <label class="form-label" for="input-date">Turno</label>
                    <input class="form-control" id="datepicker" name="turn" onchange="loadHours(this.value)" />
                </div>

                <div class="col-md-6 pl-5 pr-5 pt-3">
                    <label for="validationCustom04" class="form-label">Horarios</label>
                    <select class="form-select" id="time" name="time" required>
                    </select>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>
            </div>
            <div class="row text-center bg-warning rounded ">
                <input class="btn btn-warning " type="submit" name="Enviar!" />


            </div>
        </div>


    </form>
    <div class="container bg-reddark text-center text-white p-3 rounded shadow-lg">
        <h4 class="fw-bold">La inscripción a 1° año será valida solo si recibe el mail de confirmación</h4>
    </div>
</main>
@stop