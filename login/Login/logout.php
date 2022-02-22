<?php 
require('session.php'); 
$_SESSION = array(); //blanquear la session
setcookie(session_name(), '', time()-5); //borrar la cookie
session_destroy(); //destruir la sesion
header("Location: index.php");
exit();
?>