<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Inscripcion completa</title>
</head>

<body>
    <p>Inscripcion completa a la carrera {{$career}}.</p>
    <p>Datos de la inscripcion:</p>
    <ul>
        <li>Nombre: {{$name}}</li>
        <li>Apellido: {{$surname}}</li>
        <li>DNI: {{$numdoc}}</li>
    </ul>
    @if($date && $time)
    <p>Turno solicitado:</p>
    <ul>
        <li>Fecha: {{$date}}</li>
        <li>Hora: {{$time}}</li>
    </ul>
    <hr>
    <p>Documentacion a presentar y requisitos para finalizar la inscripcion:</p>
    <ul>
        <li>Formulario de Inscripcion formato papel impreso y completo:</li>
        <ul>
            <li>
                <a href=" https://drive.google.com/file/d/1Nw70ae2aUaPFhw-NB49ETL0luFaAZAjA/view?usp=sharing""
                    target=" _blank">
                    Visualizar, descargar e imprimir formulario de Inscripción formato papel
                </a>
            </li>
        </ul>
        <li>Si finalizo la secundaria: Certificado de Estudios Secundarios (fotocopia autentidada)</li>
        <li>Si esta cursando la secundaria: Constancia de alumno regular</li>
        <li>Partida de nacimiento (fotocopia autenticada y actualizada)</li>
        <li>Fotocopia del DNI</li>
        <li>Certificado de Buena Salud emitido por entidad publica o privada sin estampillar</li>
        <li>Cooperadora: Colaboracion anual 2023 $ 9.000</li>
    </ul>
    <hr>
    <p>Su inscripcion se registrara y finalizara cuando:</p>
    <ul>
        <li>Asista al turno presencial elegido, usted o alguien en su nombre</li>
        <li>Entregue toda la documentacion y los requisitos obligatorios detallados</li>
        <li>Disponga del comprobante de inscripcion firmado y sellado por la Institución Educativa</li>
    </ul>
    <hr>
    <p><b>Si no asiste al turno presencial elegido en tiempo y forma (usted o alguien en su nombre) perdera el cupo
            automaticamente</b></p>
    @else
    <p><b>***INSCRIPCION A LISTA DE ESPERA***</b></p>
    <p><b>Se informara por e-mail que asista en caso de liberarse cupos en la carrera</b></p>
    @endif

</body>

</html>