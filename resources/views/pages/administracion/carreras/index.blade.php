@include('pages.administracion.carreras.jscripts')
@extends('pages.administracion.administracion')
@section('page')
<div class="row">
    {{$dataTable->table()}}
</div>
@stop
@push('scripts')
{{$dataTable->scripts()}}
@endpush
@yield('jscripts')