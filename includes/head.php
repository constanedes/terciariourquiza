<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ICON  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    

    <!-- BOOTSTRAP 5.1 CSS -->
    <link rel="stylesheet" href="../css/bootstrap-5.1.0.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <?php 
        $path = $_SERVER['PHP_SELF'];
        $page = basename($path);

        
        switch($page){
            case 'index.php':
                $title = 'Escuela Urquiza';
                break;
            case 'analisis-funcional.php':
                $title = 'Analista Funcional';
                break;
            case 'desarrollo-software.php':
                $title = 'Des. de Software';
                break;
            case 'infraestructura-ti.php':
                $title = 'Tecnico en ITI';
                break;
            case 'login.php':
                $title = 'Iniciar Sesion';
                break;
            case 'signup.php':
                $title = 'Registrate';
                break;
            case 'nosotros.php':
                $title = 'Sobre Nosotros';
                break;
            case 'profile.php':
                $title = 'Mi Perfil';
                break;
        }  
    ?>

    <title> <?php  echo $title ?> </title>
   
</head>

<body>