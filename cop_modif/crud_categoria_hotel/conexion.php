<?php

$host = "127.0.0.1";
$port = "3310";
$user = "root";
$pass = "";
$db = "hoteles";

$conn = new mysqli($host . ":" . $port, $user, $pass, $db);

if ($conn->connect_error) {
    echo "Error al conectar a la base de datos: " . $conn->connect_error;
}

?>

