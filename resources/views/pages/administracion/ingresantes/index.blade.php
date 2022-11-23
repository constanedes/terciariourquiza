@include('pages.administracion.ingresantes.jscripts')
@include('pages.administracion.ingresantes.confirmModal')
@extends('pages.administracion.administracion')
@section('page')
<div class="row py-5">
    {{$dataTable->table([
    'class' => 'table table-bordered table-striped table-sm'
    ])}}
</div>
@stop
@push('scripts')
{{$dataTable->scripts()}}
@endpush
@yield('confirmModal')
@yield('jscripts')