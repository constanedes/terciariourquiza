@extends('pages.administracion.administracion')
@section('page')
<form action="/administracion/turnos/crear" class="py-5" method="POST">
    @csrf
    <div class="col-md-db form-label form-date">
        <label class="form-label form-date__label" for="input-date">Fecha de Inicio para Turnos: </label>
        <input class="form-control form-date__input" type="date" id="init-date" name="fecha_inicio" required />
    </div>

    <div class="col-md-db form-label form-date">
        <label class="form-label form-date__label" for="input-date">Fecha de Fin para Turnos: </label>
        <input class="form-control form-date__input" type="date" id="end-date" name="fecha_fin" required />
    </div>

    <div class="col-md-db form-label form-time">
        <label class="form-label form-date__label" for="input-date">Horario de inicio para Turnos: </label>
        <input type="time" name="hora_inicio" min="18:00" max="21:00" step="3600" />
    </div>

    <div class="col-md-db form-label form-time">
        <label class="form-label form-date__label" for="input-date">Horario de fin para Turnos: </label>
        <input type="time" name="hora_fin" min="18:00" max="21:00" step="1800" />
    </div>

    <label for="customRange3" class="form-label">Intervalo en minutos (5 min - 60 max)
        <input type="range" class="form-range" min="5" max="60" step="5" id="customRange3" name="duration">
    </label>

    <!--<div class="col-md-db form-label form-date">
        <label class="form-label form-date__label" for="input-date">Eliminar Dia: </label>
        <input class="form-control form-date__input" type="date" id="delete-date" name="eliminar_dia" />
        <button type="button" class="btn btn-warning m-3">
            Enviar dia a eliminar
        </button>
    </div>-->

    <input type="submit" class="btn btn-warning m-3" value="Establecer">

</form>
@stop