<?php
require("db_data.php");

function abrirConexion()
{
    // global $conn;
    $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE, PORT);
    if (!$conn) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    }
}

function cerrar_conexion($conn)
{
    if (isset($conn)) {
        mysqli_close($conn);
        unset($conn);
    }
}

function verificar_consulta($ultimaConsulta, $db)
{
    mysqli_query($db, $ultimaConsulta);
    if(!$ultimaConsulta)
    {
        $salida = "No se ha podido realizar la consulta: " . mysqli_error($db) . "<br>";
        $salida.= "Ultima consulta SQL: ". $ultimaConsulta;
        die($salida);
    }
}

?>