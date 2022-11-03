@include('pages.administracion.carreras.create.jscripts')
@extends('pages.administracion.administracion')
@section('page')
<form action="/administracion/carreras/nuevo" class="row g-3 needs-validation m-3 p-5" method="post">
    @csrf
    <div class="row">
        <div class="form-group col-4 pl-5 pr-5">
            <label for="career">Carrera</label>
            <input class="form-control" id="career" name="career" type="text" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-4">
            <label for="desc">Descripcion</label>
            <textarea id="desc" name="desc" class="form-control"></textarea>
        </div>
    </div>
    <div class="row">
        <input class="btn btn-primary" type="submit">
    </div>
</form>
@stop
@yield('jscripts')