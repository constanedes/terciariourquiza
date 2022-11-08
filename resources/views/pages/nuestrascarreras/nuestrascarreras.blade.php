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
    <div class="row">
        <h4>Tecnologias utilizadas</h4>
    </div>
    <div class="row m-0 text-center">
        <div class="col"></div>



    </div>


</div>
<!-- images -->
<div class="container text-center">
    <div>
        <h3 class="bg-success mt-3 text-white rounded">1° AÑO</h3>
    </div>
    <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3">
        <div class="col">
            <div class="p-3 border bg-light">
                <img class="img-fluid mx-auto d-block"
                    src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original-wordmark.svg" />
            </div>
        </div>
        <div class="col">
            <div class="p-3 border bg-light ">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original-wordmark.svg" />
            </div>
        </div>
        <div class="col">
            <div class="p-3 border bg-light">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" />
            </div>
        </div>
    </div>
</div>

<div class="container text-center">
    <div>
        <h3 class="bg-success mt-3 text-white rounded">2° AÑO</h3>
    </div>
    <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3">
        <div class="col">
            <div class="p-3 border bg-light">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" />
            </div>
        </div>
        <div class="col">
            <div class="p-3 border bg-light">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apache/apache-original-wordmark.svg" />
            </div>
        </div>
        <div class="col">
            <div class="p-3 border bg-light">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original-wordmark.svg" />
            </div>
        </div>
    </div>
</div>

<div class="container text-center">
    <div>
        <h3 class="bg-success mt-3 text-white rounded">3° AÑO</h3>
    </div>
    <div class="row row-cols-1 row-cols-lg-1 g-1 g-lg-1 text-aling-center">
        <div class="col">
            <div class="p-3 border bg-light">
                <img class="img-fluid mx-auto d-block" style="width: 30%;"
                    src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original-wordmark.svg" />
            </div>
        </div>
    </div>
</div>
@endsection