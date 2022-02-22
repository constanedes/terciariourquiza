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

function cerrar_conexion()
{
    global $conexion;
    if (isset($conexion)) {
        mysqli_close($conexion);
        unset($conexion);
    }
}

function tablaCompleta()
{
abrir_conexion();
global $conexion;
$consulta = "SELECT * FROM precios";
$resultado = mysqli_query($conexion, $consulta);
echo "<table border = 1>";
for ($i=0; $i < mysqli_num_fields($resultado) ; $i++) { 
    $nombreCampo = mysqli_fetch_field_direct($resultado, $i);
    echo "<th>". $nombreCampo->name . "</>";
}
while ($fila = mysqli_fetch_array($resultado))
{
    echo "<tr>";
    for ($i=0; $i < mysqli_num_fields($resultado) ; $i++)
    {
        echo "<td>" . $fila[$i] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

}

function Consulta($consulta)
{
abrir_conexion();
global $conexion;
$resultado = mysqli_query($conexion, $consulta);
echo "<table border = 1>";
for ($i=0; $i < mysqli_num_fields($resultado) ; $i++) { 
    $nombreCampo = mysqli_fetch_field_direct($resultado, $i);
    echo "<th>". $nombreCampo->name . "</>";
}
while ($fila = mysqli_fetch_array($resultado))
{
    echo "<tr>";
    for ($i=0; $i < mysqli_num_fields($resultado) ; $i++)
    {
        echo "<td>" . $fila[$i] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

}



?>