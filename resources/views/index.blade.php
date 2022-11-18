@extends('layouts.main')
@section('content')
<main class="bg-secondary pt-5">
    <!-- Esc. Superior Nº 49  "Cap. Gral. J.J. Urquiza" - Nivel Terciario -->
    <div class="container text-center">
        <div class="row align-items-center ">
            <div class="col-4">
                <img src="{{ asset('img/Logo_Terciario_Urquiza_Full.png') }} " class="img-fluid" width="200rem"
                    alt="logo urquiza">
            </div>
            <div class="col-8 text-start">
                <h1>Escuela Superior Nº 49</h1>
                <h2>Capitán General Justo José de Urquiza</h2>
                <h3>Nivel Terciario</h3>
            </div>
        </div>
    </div>
    <!-- carrusel -->
    <div class="m-5">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <!-- image DS  -->
                <div class="carousel-item active">
                    <a href="/desarrollo-software">
                        <img src="{{ asset('img/developer_carousel.png') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white bg-secondary rounded shadow">Tecnico Superior en Desarrollo Software
                            </h5>
                            <p class="text-warning bg-secondary rounded shadow">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Eum voluptatibus beatae id, quasi possimus quae perspiciatis minus sit
                                reprehenderit dolorem in reiciendis ab! Quia iure assumenda magnam repellendus natus
                                ullam.</p>
                        </div>
                    </a>
                </div>
                <!-- image AF -->
                <div class="carousel-item">
                    <a href="/analisis-funcional">
                        <img src="{{ asset('img/analista_carousel.png') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block ">
                            <h5 class="text-white bg-secondary rounded shadow">Analista Funcional de Sistemas
                                Informaticos</h5>
                            <p class="text-warning bg-secondary rounded shadow">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Ipsam dolore voluptates velit maxime culpa. Autem recusandae dolore
                                laboriosam reiciendis itaque expedita, iusto labore excepturi officiis explicabo fugiat
                                repellat, temporibus ab.</p>
                        </div>
                    </a>

                </div>
                <!-- image ITI -->
                <div class="carousel-item">
                    <a href="/infraestructura-ti">
                        <img src="{{ asset('img/iti_carousel.png') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white bg-secondary rounded shadow">Soporte de Infraestructura de Tecnologia
                                de la Informacion</h5>
                            <p class="text-warning bg-secondary rounded shadow">Some representative placeholder content
                                for the third slide.</p>
                        </div>
                    </a>

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- end carrusel -->

    <!-- cards -->
    <div class="container mt-5 ">
        <div class="row text-light text-center rounded">
            <h1>Nuestras carreras</h1>
        </div>

        <div class="bg-secondary">
            @foreach($provider['careers'] as $career)
            <div class="row border border-secondary rounded  bg-light mb-3 shadow">
                <div class="col-md-4">
                    <img src="{{asset('image/'.  $career->image) }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h2 class="card-title mt-3 text-success fw-bolder">{{$career->career}}</h2>
                    <p>{{$career->desc_corta}}</p>
                    <a href="{{'/nuestrascarreras/'.$career->id}}" class="btn btn-warning">Más Informacion</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endforeach
@if(Session::get('error') != null)
<script>
    Swal.fire({
        title: 'Error!',
        text: '{{Session::get('error')}}',
        icon: 'error',
        confirmButtonText: 'OK'
    })
</script>
@endif
@if(Session::get('registroCompleto') != null)
<script>
    Swal.fire({
        title: 'Registro completo',
        text: '{{Session::get('registroCompleto')}}',
        icon: 'success',
        confirmButtonText: 'OK'
    })
</script>
@endif
@endsection