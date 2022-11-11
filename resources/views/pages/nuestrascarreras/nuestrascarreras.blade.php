@extends('layouts.main')
@section('content')
<div class="container mt-5 bg-secondary">
    <div class="row mb-3">
        <img src="{{asset('public/image/'.  $carrera->image) }}" class="img-fluid mx-auto d-block"
            alt="isologotipo Desarrollo en sistemas" style="width: 30% ;" alt="Desarrollo Software">
    </div>
    <div class="row p-3">
        {!! $carrera->desc !!}
    </div>
</div>
@endsection