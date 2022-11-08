@extends('pages.administracion.administracion')
@section('page')
<form action="/administracion/configuraciones/nuevo" class="row g-3 needs-validation m-3 p-5" method="post">
    @csrf
    <div class="row">
        <div class="form-group col-4 pl-5 pr-5">
            <label for="name">Nombre</label>
            <input class="form-control" name="name" type="text" />
        </div>
        <div class="form-group col-4 pl-5 pr-5">
            <label for="name">Observaciones</label>
            <input class="form-control" name="obs" type="text" />
        </div>
    </div>
    <div class="row">
        <div class="form-check form-switch col-4 pl-5 pr-5">
            <label class="form-check-label" for="value">Valor</label>
            <input class="form-check-input" type="checkbox" id="value" name="value">
        </div>
    </div>
    <div class="row">
        <input class="btn btn-primary" type="submit">
    </div>
</form>
@stop
@yield('jscripts')