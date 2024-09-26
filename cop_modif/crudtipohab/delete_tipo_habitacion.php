<?php
include 'conexion.php';

if (isset($_GET['id_tipo'])) {
    $id_tipo = $_GET['id_tipo'];

    $sql = "DELETE FROM tipo_habitacion WHERE id_tipo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_tipo);

    if ($stmt->execute()) {
        echo "Tipo de habitación eliminado exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID de tipo de habitación no especificado.";
}
?>
<a href="index.php">Volver</a>
