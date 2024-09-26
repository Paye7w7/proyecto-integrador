<?php
include 'conexion.php';

if (isset($_GET['Id_hab'])) {
    $Id_hab = $_GET['Id_hab'];

    $sql = "DELETE FROM habitacion WHERE Id_hab = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $Id_hab);

    if ($stmt->execute()) {
        echo "Habitación eliminada exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID de habitación no especificado.";
}
?>
<a href="index.php">Volver</a>
