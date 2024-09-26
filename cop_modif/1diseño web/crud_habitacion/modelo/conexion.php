<?php
$conexion = new mysqli("127.0.0.1:3310", "root", "", "hoteles");
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");
?>
