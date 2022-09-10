@extends('pages.administracion.administracion')
@section('page')
    {{$dataTable->table()}}
@stop
@push('scripts')
    {{$dataTable->scripts()}}
@endpush