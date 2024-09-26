<?php
include 'conexion.php';

if (isset($_GET['id_piso'])) {
    $id_piso = $_GET['id_piso'];
    
    // Realizar la restauración lógica
    $sql = "UPDATE piso_habitacion SET deleted = FALSE WHERE id_piso = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_piso);

    if ($stmt->execute()) {
        echo "Piso restaurado exitosamente";
        header("Location: borradores.php");
        exit();
    } else {
        echo "Error al restaurar el piso: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "ID de piso no especificado.";
}

$conn->close();
?>
