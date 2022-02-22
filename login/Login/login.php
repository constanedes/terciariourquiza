<?php require ('header.php') ?>
<?php require('session.php') ?>
<?php require_once('connection_db.php') ?>
<?php
    if (isset($_SESSION['username'])) //verificacion para que el usuario no se vuelva a loguear sin desloguearse antes
    {
        header("Location: admin.php");
        exit();
    }

    if (isset($_POST['username'])) 
    {
        $usarname = trim($_POST["username"]);
        $password = sha1(trim($_POST["password"]));

        abrir_conexion();
        $usuario = autenticar($usarname, $password);

        if ($usuario)        
        {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["passwoord"] = $_POST["password"];
            header ("Location: admin.php");
            exit;
        }
        else
        {
            cerrar_conexion();
            header ("Location: login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PRACTICA 5 - LOGIN</title>
</head>
<body>
    <H1>LOGIN</H1>
    <form action="login.php" method="post">
        Nombre de usuario:<input type="text" name="username" placeholder="Ingresar nombre de usuario">
        <br>
        Contraseña:<input type="password" name="password" placeholder="Ingresar password">
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>