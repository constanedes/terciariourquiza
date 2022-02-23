<?php

require("db_data.php");

$conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE, PORT);

if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') '
        . $conn->connect_error);
}

?>