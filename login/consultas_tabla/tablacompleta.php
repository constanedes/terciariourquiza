<?php 
require_once('connection_db.php');
 
tablaCompleta();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 9-2</title>
</head>
<body>
   <ul>
       <li><a href="a.php">Nro. de articulo creciente</a></li>
       <li><a href="b.php">Descripción del articulo (alfabético creciente)</a></li>
       <li><a href="c.php">Nro. de proveedor creciente y dentro del mismo por Nro. de articulo creciente</a></li>
       <li><a href="d.php">Nro. de proveedor creciente y dentro del mismo por Nro. de articulo decreciente</a></li>
       <li><a href="e.php">Los artículos cuyo precio sea mayor a $20.</a></li>
       <li><a href="f.php">Los artículos que tengan cantidad en stock mayor a 1000.</a></li>
       <li><a href="g.php">Los artículos que empiecen con la letra ‘A’. </a></li>
       <li><a href="h.php">Los artículos que cumplan las 3 condiciones anteriores a la vez.</a></li>
       <li><a href="i.php">Los artículos que cumplan con alguna de las 3 condiciones anteriores.</a></li>
       <li><a href="j.php">Los artículos que no cumplan con ninguna de las 3 condiciones anteriores.</a></li>
   </ul>
</body>
</html>