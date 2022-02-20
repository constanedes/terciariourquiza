<?php

require("db_data.php");

$conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE, PORT);

if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') '
            . $conn->connect_error);
}
echo '<p>Connection OK '. $conn->host_info.'</p>';
echo '<p>Server '.$conn->server_info.'</p>';
echo '<p>Initial charset: '.$conn->character_set_name().'</p>';
echo "---------------------------- <br>";

/* $conn->close(); */
?>


