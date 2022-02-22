<?php
require_once("constants.php");

function abrir_conexion()
{
    global $conexion;
    $conexion = mysqli_connect (DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$conexion) {
        die("No hemos podido conectarnos a la base de datos" . mysqli_connect_errno());
    }
}

function autenticar ($usuario="", $clave="")
{
    $sql = "SELECT * FROM datos ";
    $sql.= "WHERE username = '$usuario' ";
    $sql.= "AND password = '$clave' ";
    $sql.= "LIMIT 1";
    $matriz_usuarios = buscar_por_sql($sql);
    return (!empty($matriz_usuarios)) ? array_shift($matriz_usuarios) : false;
}

function buscar_por_sql($sql)
{
    $resultado = enviar_consulta($sql);
    $matriz_usuarios = array();
    while($registro = mysqli_fetch_array($resultado))
    {
        array_push($matriz_usuarios, $registro);
    }
    return $matriz_usuarios;
}

function enviar_consulta($sql)
{
    global $conexion;
    $ultimaConsulta = $sql;
    $resultado = mysqli_query($conexion, $sql);
    verificar_consulta($resultado, $ultimaConsulta);
    return $resultado;
}

function verificar_consulta($consulta, $ultimaConsulta)
{
    if (!$consulta)
    {
        $salida = "No se ha podido realizar la consulta: ". mysqli_error() . "<br>";
        $salida.= "Ultima consulta SQL: ". $ultimaConsulta;
        die($salida);
    }
}

function cerrar_conexion()
{
    global $conexion;
    if (isset($conexion)) {
        mysqli_close($conexion);
        unset($conexion);
    }
}

function busquedaRepetido ($username)
{
    global $conexion;
    $sql = "SELECT * FROM datos WHERE username = '$username' ";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        return 1;
    } else {
        return 0;
    }
}
?>