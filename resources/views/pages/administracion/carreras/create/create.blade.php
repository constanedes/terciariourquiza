@include('pages.administracion.carreras.create.jscripts')
@extends('pages.administracion.administracion')
@section('page')
<form action="/administracion/carreras/nuevo" class="row g-3 needs-validation m-3 p-5" method="post"
    enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-6 pl-5 pr-5">
            <label for="career">Carrera</label>
            <input class="form-control" id="career" name="career" type="text" required />
        </div>
        <div class="form-group col-6 pl-5 pr-5">
            <label for="image">Imagen</label>
            <input class="form-control" id="image" name="image" type="file" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <label for="career">Descripcion corta</label>
            <textarea class="form-control" id="desc_corta" name="desc_corta" type="text" required></textarea>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <label for="desc">Descripcion</label>
            <textarea class="ckeditor" name="desc" id="desc" rows="10" cols="80" required></textarea>
        </div>
    </div>
    <div class="row">
        <input class="btn btn-warning" type="submit">
    </div>
</form>
@stop
@yield('jscripts')