<?php
include 'conexion.php';

$sql = "SELECT Id_tipo_ser, Nombre_tipo FROM tipo_servicio";
$result = $conn->query($sql);

$tipos_servicio = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tipos_servicio[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($tipos_servicio);
?>
