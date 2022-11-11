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
    @endif
</body>

</html>