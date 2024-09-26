<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_tipo = $_POST['nombre_tipo'];
    $descripcion_tipo = $_POST['descripcion_tipo'];
    $servicio = $_POST['servicio'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO tipo_habitacion (nombre_tipo, descripcion_tipo, servicio, estado)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $nombre_tipo, $descripcion_tipo, $servicio, $estado);

    if ($stmt->execute()) {
        echo "Tipo de Habitación agregado exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<a href="index.php">Volver</a>
