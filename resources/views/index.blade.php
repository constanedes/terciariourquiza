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
            @foreach($careers as $career)
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
            @endforeach
            <!-- card ds 
            <div class="row border border-secondary rounded  bg-light mb-3 shadow">
                <div class="col-md-4">
                    <img src="{{ asset('img/ds_card.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h2 class="card-title mt-3 text-success fw-bolder">Tecnico Superio en Desarrollo de Software</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis deleniti quam sint cum magni ea enim nostrum eligendi neque, incidunt doloremque excepturi recusandae vel accusantium, atque, soluta beatae illo impedit!
                    </p>
                    <a href="#" class="btn btn-warning">Más Informacion</a>                    
                </div>
            </div>-->
            <!-- card iti
            <div class="row border border-secondary rounded  bg-light mb-3 shadow">
                <div class="col-md-4">
                    <img src="{{ asset('img/iti_card.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h2 class="card-title mt-3 text-danger fw-bolder">Tecnico Superio en Desarrollo de Software</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis deleniti quam sint cum magni ea enim nostrum eligendi neque, incidunt doloremque excepturi recusandae vel accusantium, atque, soluta beatae illo impedit!
                    </p>
                    <a href="#" class="btn btn-warning">Más Informacion</a>
                </div>
            </div>-->
            <!-- card af
            <div class="row border border-secondary rounded  bg-light mb-3 shadow">
                <div class="col-md-4">
                    <img src="{{ asset('img/af_card.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h2 class="card-title mt-3 text-primary fw-bolder">Tecnico Superio en Desarrollo de Software</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis deleniti quam sint cum magni ea enim nostrum eligendi neque, incidunt doloremque excepturi recusandae vel accusantium, atque, soluta beatae illo impedit!
                    </p>
                    <a href="#" class="btn btn-warning">Más Informacion</a>
                </div>
            </div>-->
        </div>
    </div>
    <!-- end card -->


    <!-- NOVEDADES -->
    <!-- <div class="container espacio rounded p50" id="novedades">
        <h2>Novedades</h2>
        <section id="finales">
            <h3>INSCRIPCIÓN AL 1º LLAMADO DE FINALES FEB/MAR 2022</h3>
            <article class="border border-primary rounded espacio p25">
                <h4>TS en Análisis Funcional de Sistemas Informáticos</h4>
                <p>Formulario de inscripción: <a
                        href="https://forms.gle/uvhBHPgNkV2qSLmk9">https://forms.gle/uvhBHPgNkV2qSLmk9</a>
                </p>
                <p>Cronograma: DICIEMBRE_2022_AF</p>
            </article>
            <article class="border border-success rounded espacio">
                <h4>TS en Desarrollo de Software</h4>
                <p>Formulario de inscripción: <a
                        href="https://forms.gle/uvhBHPgNkV2qSLmk9">https://forms.gle/uvhBHPgNkV2qSLmk9</a>
                </p>
                <p>Cronograma: DICIEMBRE_2022_AF</p>
            </article>
            <article class="border border-warning rounded espacio">
                <h4>TS en Infraestructura de Tecnología de Información</h4>
                Formulario de inscripción: <a
                    href="https://forms.gle/uvhBHPgNkV2qSLmk9">https://forms.gle/uvhBHPgNkV2qSLmk9</a>
                <p>Cronograma: DICIEMBRE_2022_AF</p>
            </article>
        </section>
        <section id="inscripción">
            <h3>INSCRIPCIÓN 2022</h3>
            <p>Podrá realizar en el siguiente formulario la INSCRIPCIÓN PARA PRIMER AÑO 2022. Disponible on-line desde
                16/11/2021 y turnos presenciales a partir del 23/11/2021 hasta el 17/12/2021.</p>
            <p>No hay más cupos disponibles para ingreso a 1er año. Más información de nuevas fechas de apertura de
                pre-inscripción en el formulario.</p>
            <p>Formulario de trámites del Nivel Terciario de la Escuela Superior de Comercio J. J. Urquiza N° 49 de
                Rosario.
                https://forms.gle/Uo1UKSJSqmNdoDhG7</p>
        </section>
        <section id="calendario">
            <h3>CALENDARIO AÑO 2022</h3>
            <ul id="fechas">
                <li><strong>07/02 al 11/02</strong>: Inscripción de alumnos a Exámenes Finales 1º Turno (1º llamado).
                </li>
                <li><strong>21/02 al 18/03</strong>: Inscripción de alumnos a Exámenes Finales 1º Turno (2º llamado).
                </li>
                <li><strong>21/03 al 25/03</strong>: Inscripción a las UC de 2º y 3º año.</li>
                <li><strong>21/03 al 09/04</strong>: Curso introductorio para 1º año de carácter obligatorio.</li>
                <li><strong>11/04</strong>: Inicio de clases.</li>
            </ul>
        </section>
    </div> -->
</main>
@stop