<?php
include 'conexion.php';

if (isset($_GET['id_piso'])) {
    $id_piso = $_GET['id_piso'];
    
    // Realizar el borrado lógico
    $sql = "UPDATE piso_habitacion SET deleted = TRUE WHERE id_piso = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_piso);

    if ($stmt->execute()) {
        echo "Piso eliminado exitosamente";
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar el piso: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "ID de piso no especificado.";
}

$conn->close();
?>
