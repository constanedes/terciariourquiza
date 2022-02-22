<?php require 'header.php' ?>
<?php
require_once("connection_db.php");
abrir_conexion();
$username = $_POST["username"];
$password = sha1($_POST["password"]);
//$conexion = mysqli_connect (DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//$validarUsuario = "SELECT * FROM `datos` WHERE username = $username";
//$usuario = mysqli_query($conexion, $validarUsuario);
if (busquedaRepetido($username)>0)
{
   echo ("Usuario creado, prueba con otro <br>");
   ?>
   <a href="registro.php">Registrate.</a>
   <?php
}
else
{
   $alta = "INSERT INTO `datos`(`username`, `password`) VALUES ('$username','$password')";
   mysqli_query($conexion, $alta);
   header("Location: index.php");
}
?>