@extends('layouts.main')
@section('content')
    <main>
        <div class="container espacio" id="carreras">
            <div class="row bg-secondary text-white text-center rounded-top">
                <h1>Nuestras carreras</h1>
            </div>
            <div class="row justify-content-evenly text-center">
                <div class="col"></div>
                <div class="col">
                    <a href="/analisis-funcional">
                        <div class="card h-100" style="width: 14rem;">
                            <img src="{{ asset('img/AF2.svg') }}" class="card-img-top" alt="Analista Funcional">
                            <div class="card-body ">
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi quasi,
                                    laudantium ipsa harum modi suscipit veritatis</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col justify-content-center">
                    <a href="/infraestructura-ti">
                        <div class="card h-100" style="width: 14rem;">
                            <img src="{{ asset('img/ITI2.SVG') }}" class="card-img-top" alt="Infraestructura TI">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium
                                    similique obcaecati nihil totam accusantium eos</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col justify-content-center">
                    <a href="/desarrollo-software">
                        <div class="card h-100" style="width: 14rem;">
                            <img src="{{ asset('img/DS2.svg') }}" class="card-img-top" alt="Desarrollo de software">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae,
                                    ducimus minus ipsam dicta, omnis accusamus</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col"></div>
            </div>
        </div>
        <div class="container espacio rounded p50" id="novedades">
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
        </div>
    </main>
@stop