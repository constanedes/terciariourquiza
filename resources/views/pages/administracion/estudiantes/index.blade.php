@include('pages.administracion.estudiantes.jscripts')
@extends('pages.administracion.administracion')
@section('page')
<div class="row py-5">
    {{$dataTable->table()}}
</div>
@stop
@push('scripts')
{{$dataTable->scripts()}}
@endpush
@yield('jscripts')