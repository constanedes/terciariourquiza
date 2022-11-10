@include('pages.administracion.carreras.jscripts')
@include('pages.administracion.carreras.delete.modalDelete')
@include('pages.administracion.carreras.cupo.modalCupo')
@extends('pages.administracion.administracion')
@section('page')
<div class="row py-5">
    {{$dataTable->table()}}
</div>
@stop
@push('scripts')
{{$dataTable->scripts()}}
@endpush
@yield('modalDelete')
@yield('modalCupo')
@yield('jscripts')