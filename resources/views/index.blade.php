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
                <div class="carousel-item active position-relative ">
                    <a href="/desarrollo-software">
                        <img src="{{ asset('img/developer_carousel.png') }}" class="d-block w-100 carousel-bg" alt="...">
                        <div class="carousel-caption d-none d-md-block position-absolute button-0 start-5 text-light text-start" >
                            <div>
                                <h5 
                                class="col-5 fw-bolder text-warning" >
                                Tecnico Superior en Desarrollo Software
                                </h5>
                        </div>
                            
                            <p class="">El Técnico Superior en Desarrollo de Software participa en proyectos de desarrollo de software desempeñando roles que tienen por objeto producir artefactos de software (programas, módulos, objetos).</p>
                        </div>
                    </a>
                </div>
                <!-- image AF -->
                <div class="carousel-item position-relative">
                    <a href="/analisis-funcional">
                        <img src="{{ asset('img/analista_carousel.png') }}" class="d-block w-100 carousel-bg" alt="...">
                        <div class="carousel-caption d-none d-md-block position-absolute button-0 start-5 text-light text-start">
                            <h5 class="col-5 fw-bolder text-warning">Analista Funcional de Sistemas
                                Informaticos</h5>
                            <p >El Técnico Superior en Análisis Funcional de Sistemas Informáticos estará capacitado para comprender e interpretar fines, negocios o actividades de una organización, analizar los procesos que se llevan a cabo, averiguar las necesidades de información, proponer mejoras, especificar requisitos de software, redactar manuales y procedimientos, y apoyar la puesta en marcha de sistemas, actuando de nexo entre usuarios de la organización y el grupo de proyecto, desarrollando las actividades descriptas en el perfil profesional y cumpliendo con los criterios de realización establecidos para las mismas</p>
                        </div>
                    </a>

                </div>
                <!-- image ITI -->
                <div class="carousel-item position-relative">
                    <a href="/infraestructura-ti">
                        <img src="{{ asset('img/iti_carousel.png') }}" class="d-block w-100 carousel-bg" alt="...">
                        <div class="carousel-caption d-none d-md-block position-absolute button-0 start-5 text-light text-start">
                            <h5 class="col-6 fw-bolder text-warning">Soporte de Infraestructura de Tecnologia
                                de la Informacion</h5>
                            <p >El Técnico Superior en Infraestructura de Tecnología de la Información estará capacitado para implementar, mantener, actualizar, analizar inconvenientes y resolver problemas derivados de la operación de productos de tecnología de la información que cumplen funciones de sistema operativo, administración de almacenamiento, comunicaciones y redes, seguridad, bases de datos, y otros subsistemas, para garantizar la máxima disponibilidad del ambiente operativo de las aplicaciones informáticas de las organizaciones desarrollando las funciones descriptas en el perfil profesional y cumpliendo con los criterios de realización establecidos para las mismas, para lo cual coordinará o complementará su trabajo con especialistas de la misma organización o externos.</p>
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
                    <img src="{{asset('public/image/'.  $career->image) }}" alt="" class="img-fluid">
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