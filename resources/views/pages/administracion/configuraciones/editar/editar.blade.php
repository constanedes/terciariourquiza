@extends('pages.administracion.administracion')
@section('page')
<form action="/administracion/configuraciones/edit" class="row g-3 needs-validation m-3 p-5" method="post">
    @csrf
    <div class="row">
        <div class="form-group col-4 pl-5 pr-5">
            <label for="name">Nombre</label>
            @if($setting->name == 'inscripcion')
            <input class="form-control" name="name" type="text" value="{{$setting->name}}" readonly />
            @else
            <input class="form-control" name="name" type="text" value="{{$setting->name}}" />
            @endif
        </div>
        <div class="form-group col-4 pl-5 pr-5">
            <label for="name">Observaciones</label>
            <input class="form-control" name="obs" type="text" value="{{$setting->obs}}" />
        </div>
    </div>
    <div class="row">
        <div class="form-check form-switch col-4 pl-5 pr-5">
            <label class="form-check-label" for="value">Valor</label>
            @if($setting->value == 0)
            <input class="form-check-input" type="checkbox" id="value" name="value" />
            @else
            <input class="form-check-input" type="checkbox" id="value" name="value" checked />
            @endif
        </div>
    </div>
    <div class="row">
        <input type="hidden" name="id" value="{{$setting->id}}">
        <input class="btn btn-warning" type="submit">
    </div>
</form>
@stop
@yield('jscripts')