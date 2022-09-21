@extends('layouts.main') @section('content')
<main>
    <div class="container-fluid text-center mt-5">
        <!-- Titulo -->
        <div class="row align-items-center ">
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
        <!-- Foto y Descripcion -->
        <div class="row align-items-start bg-secundary mt-5">
            <div class="col-5">
                <img
                    src="{{ asset('img/front_school_2.jpg') }} "
                    class="img-fluid"
                    width="1000rem"
                    alt="logo urquiza"
                />
            </div>
            <div class="col-5">
                <h3>Nuestra Historia</h3>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Laborum quisquam eos, placeat quasi aliquid, quaerat
                    corrupti tempora libero atque ratione explicabo molestiae
                    vel accusantium nobis tempore? Cum dolores laudantium hic!
                    Ut unde modi esse maxime, vel tenetur quas reprehenderit
                    possimus architecto quaerat reiciendis libero rem
                    accusantium nostrum rerum voluptate voluptates nobis
                    cupiditate. Inventore nulla obcaecati consequuntur at unde,
                    ipsa pariatur! Nam dolorem necessitatibus molestiae
                    accusamus vel fugit ex quos ipsum doloremque! Dolore quidem
                    quaerat iste ipsam velit, assumenda labore libero recusandae
                    veniam, dolorem dicta odio cupiditate error temporibus
                    dolorum exercitationem. Dolorem nihil facilis quasi
                    similique, exercitationem nemo aliquam soluta molestias
                    dolore. Maxime, natus ex illo nam sapiente dolor doloremque
                    earum ratione. Adipisci alias natus commodi possimus sint!
                    Cupiditate, nemo eligendi? Optio vero quia repellat quae
                    asperiores aliquid officiis dicta. Ducimus iusto illum iste
                    aperiam, aut, quibusdam vel, dignissimos explicabo enim
                    maxime dolores fugiat a ipsum culpa voluptatum cum optio.
                    Fugit? Quo odio temporibus, molestias commodi maxime magnam
                    assumenda sed aspernatur itaque sint, accusamus inventore
                    veritatis asperiores harum deserunt non voluptas excepturi
                    expedita et, recusandae nesciunt quas. Explicabo, doloribus
                    maiores? Hic. Rem quis eveniet labore sed nisi voluptatem
                    maiores dicta molestias corrupti eos ad, unde, debitis
                    doloribus illum reiciendis dolor perferendis accusamus
                    iusto. Quis natus sit aliquam minus maxime temporibus iusto.
                    Perspiciatis temporibus praesentium molestiae in itaque!
                    Quam quidem iste nihil minima necessitatibus labore ipsa
                    aspernatur! Rerum laborum omnis quod dolores aperiam odit
                    mollitia sunt, aspernatur, cumque quia iure, ullam
                    perferendis! Consequatur adipisci saepe ex officia veniam?
                    Culpa officiis laboriosam assumenda porro earum error
                    tenetur eum, vitae aperiam sed reiciendis vel eius! A
                    nesciunt cum tempore, ab laborum non inventore ratione!
                    Delectus, hic. Ipsum, at. Ipsam earum dolorem deserunt. Nam
                    similique quis quisquam impedit doloremque nisi ullam. Ex
                    eligendi dolore nam dignissimos ut ducimus. Delectus dolorum
                    explicabo itaque hic, ipsum officiis.
                </p>
            </div>
            
        </div>
        <!-- Mapa -->
        <div class="row border border-secondary">
            <div class="col-8">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.334091208755!2d-60.65607042436095!3d-32.94218775871076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b7ab40ca7560ef%3A0xa4c4f77ae97baa0e!2sEscuela%20Superior%20De%20Comercio%20N%C2%B0%2049%20%22Justo%20Jose%20De%20Urquiza%22!5e0!3m2!1ses!2sar!4v1663459817174!5m2!1ses!2sar"
                    width="800 rem"
                    height="600 rem"
                    style="border: 0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
            <div class="col-4">
                <p>Bv. Oroño 690 - Rosario</p>
                <p>Telefono: (0341) 4721430 - (0341) 4721431</p>
                <p>Mail: info@terciariourquiza.edu.ar</p>
                <p>Horarios bedelia: Lunes a Viernes de 20 a 22 hs</p>
            </div>
        </div>
    </div>
</main>
@stop