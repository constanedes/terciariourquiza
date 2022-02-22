<?php
    session_start();

    function verificar_sesion()
    {
        if (!isset($_SESSION["username"])) {
            header("Location: login.php");
            exit();
        }
    }
?>