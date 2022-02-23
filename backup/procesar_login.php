<?php 
/* $user = $_POST['usuario'];
$password = $_POST['contraseña'];

if(empty($user) || empty($password)){
    header("index.php");
}
*/


require("db/db.php");
$consulta = 'SELECT `id` FROM `desarrollo_software`';
$query = mysqli_query($conn, $consulta);

$array = array();
$cont = 0;

while($fila = mysqli_fetch_assoc($query)) {
    $array[$cont] = $fila['id'];
   
    $cont = $cont + 1;
    
}

for($i = 0; $i < count($array); $i++){

    $nuevo = str_replace(".", "", $array[$i]);
    $nueva_consulta = 'UPDATE `desarrollo_software` SET id=$nuevo WHERE id=$i';
    echo("<br> $nuevo");
    mysqli_query($conn, $nueva_consulta); 
}

?>