<?php require('session.php') ?>
<?php verificar_sesion(); ?>
<?php 
require_once("constants.php");
$conexion = mysqli_connect (DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<h1>Administracion</h1>
<h3> Bienvenido 
<?php echo $_SESSION["username"];?>
</h3>

<ul>
    <li><a href="Practica_6_1.php">Programa 1...</a></li>
    <li><a href="Practica_6_2.php">Programa 2...</a></li>
    <li><a href="logout.php">Salir</a></li>
</ul>
</body>
</html>
