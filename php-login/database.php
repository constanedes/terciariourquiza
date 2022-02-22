<?php

$server = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'php_login_database';

try { //si todo es correcto nos almacena la conexion a la BD en la variable conn
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} 
catch (PDOException $e) {
  die('Error de conexion:  ' . $e->getMessage());
  //Si se obtiene un error, que termine con el proceso y muestre un mensaje
}
?>