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
                    class="img-fluid shadow carousel-bg"
                    width="100%"
                    alt="logo urquiza"
                />
                <div class="position-absolute top-50 start-0 text-white p-5">
                    <h3 class="font-monospace">
                        Nuestra Historia
                    </h3>
                    <p>
                        La Carrera de Analista de Sistemas de Computación de Nivel Terciario fue creada en la Escuela de Comercio Nº 49 "Cap. Gral J.J.de Urquiza", en el año 1986, dependiendo de la Dirección Nacional de Educación Superior, del Ministerio de Educación y Justicia de la Nación.
                        Su creación permitió elevar el establecimiento a la categoría de Escuela Superior, y contó con dos divisiones de primer año en su inicio.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row rouned">
            
            <div class="col-8">
                <div class="text-white">                    
                    <p>
                        Los contenidos de la Carrera estaban determinados por el plan RM Nº 1823/83, el cual establecía una duración de tres años para obtener el título de Analista de Sistemas de Computación, con un título intermedio de Analista Programador, al aprobar segundo año.
                        La carga horaria del Plan Nº 1823/83, era de 62hs distribuidas en veinte para primer año veinte para segundo y veintidós para tercero.
                        En el año 1989, se elevó a la Dirección Nacional un proyecto para actualizar los contenidos de la Carrera. Este mantiene la duración, pero cambia la distribución horaria incrementando el total a 69 horas e introduce cambios necesarios para ajustar las materias a las necesidades de una permanente actualización. El proyecto fue aprobado por la Resolución Ministerial 1066/90. El primero de abril del año 1994 la escuela fue transferida, junto con otros establecimientos, a la jurisdicción provincial. Hasta la fecha no se ha modificado su estructura curricular ni su sistema de promoción.
                    </p>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <div class="">
                    <img
                    class="carousel-bg"
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
                    class="carousel-bg"
                    src="{{ asset('img/front_school_2.jpg') }} " alt="logo urquiza" width="100%"
                />
                </div> 
            </div>
            
            <div class="col-8">
                <div class="text-white">                    
                    <p>
                        Estas carreras tendrán a partir del 2106 marcos de referencias aprobados por el Consejo Federal de Educación, cambiando su denominación a: Analista Programador como Desarrollador de Software y la carrera Informática y Redes de Datos como Soporte de Infraestructura de Tecnologías de Información.
                        Ambas carreras nuevas se dictarán dentro del Área Tecnológica de Rosario, donde se ubican las principales empresas de TI conformando el Polo Tecnológico de Rosario. El lugar físico de dictado de ambas carreras se encuentran en construcción y representarán un edificio nuevo dentro del espacio ocupado por el ex Batallón 121.

                        Este nuevo desafío representa un estímulo para nuestra institución cuya trayectoria exitosa viene marcando un indudable lugar en el mercado laboral regional.
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
