@extends('layouts.main') @section('content')
<main>
    <div class="container-fluid text-center mt-5">
        <!-- Titulo -->
        <div class="row align-items-center">
            <div class="col-4">
                <img
                    src="{{ asset('img/Logo_Terciario_Urquiza_Full.png') }} "
                    class="img-fluid"
                    width="200rem"
                    alt="logo urquiza"
                />
            </div>
            <div class="col-8 text-start">
                <h1>Escuela Superior Nº 49</h1>
                <h2>Capitan General. Justo José de Urquiza</h2>
                <h3>Nivel Terciario</h3>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row rouned">
            <div class="col position-relative">
                <img
                    src="{{ asset('img/front_school.jpg') }} "
                    class="img-fluid shadow"
                    width="100%"
                    alt="logo urquiza"
                />
                <div class="position-absolute top-50 start-0 text-white p-5">
                    <h3 class="shadow text-warning font-monospace">
                        Nuestra Historia
                    </h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Illo, maiores architecto? Nobis obcaecati fugit tenetur
                        blanditiis numquam sequi voluptatum, doloremque quidem
                        a, officia ipsum in provident excepturi reprehenderit
                        modi dignissimos. Voluptatem iure dicta cumque quaerat
                        et quo quas nobis ad. Exercitationem aliquam, explicabo
                        laboriosam cum, quidem dolore doloremque, distinctio
                        earum accusantium architecto neque! Sint beatae eaque
                        molestiae hic inventore enim?
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row rouned">
            
            <div class="col-8">
                <div class="text-white">
                    <h3 class="text-warning font-monospace">
                        Nuestra Historia
                    </h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Illo, maiores architecto? Nobis obcaecati fugit tenetur
                        blanditiis numquam sequi voluptatum, doloremque quidem
                        a, officia ipsum in provident excepturi reprehenderit
                        modi dignissimos. Voluptatem iure dicta cumque quaerat
                        et quo quas nobis ad. Exercitationem aliquam, explicabo
                        laboriosam cum, quidem dolore doloremque, distinctio
                        earum accusantium architecto neque! Sint beatae eaque
                        molestiae hic inventore enim?
                    </p>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <div class="">
                    <img
                    src="{{ asset('img/front_school_2.jpg') }} " alt="logo urquiza" width="100%"
                />
                </div> 
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row rouned">
            <div class="col-4 d-flex justify-content-end">
                <div class="">
                    <img
                    src="{{ asset('img/front_school_2.jpg') }} " alt="logo urquiza" width="100%"
                />
                </div> 
            </div>
            
            <div class="col-8">
                <div class="text-white">                    
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Illo, maiores architecto? Nobis obcaecati fugit tenetur
                        blanditiis numquam sequi voluptatum, doloremque quidem
                        a, officia ipsum in provident excepturi reprehenderit
                        modi dignissimos. Voluptatem iure dicta cumque quaerat
                        et quo quas nobis ad. Exercitationem aliquam, explicabo
                        laboriosam cum, quidem dolore doloremque, distinctio
                        earum accusantium architecto neque! Sint beatae eaque
                        molestiae hic inventore enim?
                    </p>
                </div>
            </div>
            
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col img-fluid">                
                    <div >
                        <img
                        src="{{ asset('img/inside_school.jpg') }} " 
                        alt="logo urquiza" 
                        width="100%"
                    />
                    </div> 
                
            </div>
        </div>
        <div class="row rouned">            
            <div class="col">
                <div class="text-white text-center">                    
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Illo, maiores architecto? Nobis obcaecati fugit tenetur
                        blanditiis numquam sequi voluptatum, doloremque quidem
                        a, officia ipsum in provident excepturi reprehenderit
                        modi dignissimos. Voluptatem iure dicta cumque quaerat
                        et quo quas nobis ad. Exercitationem aliquam, explicabo
                        laboriosam cum, quidem dolore doloremque, distinctio
                        earum accusantium architecto neque! Sint beatae eaque
                        molestiae hic inventore enim?
                    </p>
                </div>
            </div>
            
        </div>
    </div>

    <div class="container mt-3 bg-warning text-white rounded-top border border-dark shadow p-3" >
        <h2 class="title text-center">CONTACTANOS</h2>
        <div class="row">                      
            <div class="col 6">
                <p>Bv. Oroño 690 - Rosario</p>
                <p>Telefono: (0341) 4721430 - (0341) 4721431</p>
                <p>Mail: info@terciariourquiza.edu.ar</p>
                <p>Horarios bedelia: Lunes a Viernes de 20 a 22 hs</p>
            </div>
            <div class="col-6">
                <form method="post" action="/contact">
                    <div class="form-group mt-2">
                      <label for="formGroupExampleInput">Email:</label>
                      <input type="text" name="email" required="required" class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group mt-2">
                      <label for="formGroupExampleInput2">Consulta:</label>
                      <input type="text" name="consulta" required="required" class="form-control"  placeholder="Consulta">
                    </div>
                    <div class="d-flex align-items-end flex-column mt-3 ">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-md ">Enviar</button>
                    </div>                    
                  </form>
            </div>
        </div>

        <div class="row border border-secondary">
            <div class="col">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.334091208755!2d-60.65607042436095!3d-32.94218775871076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b7ab40ca7560ef%3A0xa4c4f77ae97baa0e!2sEscuela%20Superior%20De%20Comercio%20N%C2%B0%2049%20%22Justo%20Jose%20De%20Urquiza%22!5e0!3m2!1ses!2sar!4v1663459817174!5m2!1ses!2sar"
                    width="100%"
                    height="100%"
                    style="border: 0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>            
        </div>
        
        
    </div>

    <!-- Mapa -->
    
</main>
@stop
