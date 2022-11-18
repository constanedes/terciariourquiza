@section('footer')
<!-- Footer -->


<section class="d-flex justify-content-between p-1 mt-4  shadow bg-warning">
</section>


<!-- Section: Links  -->
<div class="bg-dark">
    <div class="container text-center text-md-start mt-1">
        <!-- Grid row -->
        <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <a href="/">
                    <img src="{{ asset('img/Logo_Terciario_Urquiza_Full_blanco.png') }} " class="img-fluid"
                        width="200rem" alt="logo urquiza" data-aos="flip-down">
                </a>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold">Carreras</h6>
                @foreach($provider['careers'] as $career)
                <p>
                    <a href="{{'/nuestrascarreras/'.$career->id}}" class="text-white">{{$career->career}}</a>
                </p>
                @endforeach
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold">Tramites</h6>
                @if($provider['inscription']->value == 1)
                <p>
                    <a href="/preinscripcion" class="text-white">Inscripción</a>
                </p>
                @endif
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold">Contactos</h6>

                <p><i class="fas fa-home mr-3"></i> Bv. Oroño 690 - Rosario</p>
                <p><i class="fas fa-envelope mr-3"></i> info@terciariourquiza.edu.ar</p>
                <p><i class="fas fa-phone mr-3"></i> (0341) 4721430</p>
                <p><i class="fas fa-print mr-3"></i> (0341) 4721431</p>
                <p><i class="fas fa-print mr-3"></i> Horarios bedelia: Lunes a Viernes de 20 a 22 hs</p>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
    </div>
</div>
<!-- Section: Links  -->

<!-- Copyright -->
<div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2022 Copyright:
    <a class="text-white" href="https://github.com/constanedes/terciariourquiza">EQUIPO DS31 </a>
</div>
<!-- Copyright -->

<!-- Footer -->


<!-- End of .container -->

@stop