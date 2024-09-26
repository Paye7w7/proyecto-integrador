<?php
include 'conexion.php';
session_start();

if (isset($_GET['id'])) {
    $id_servicio = $_GET['id'];

    // Consulta SQL para eliminar el servicio
    $sql = "DELETE FROM servicio WHERE Id_ser=$id_servicio";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Servicio eliminado correctamente.";
    } else {
        $_SESSION['error'] = "Error al eliminar el servicio: " . $conn->error;
    }
}

header("Location: index_servicio.php");
exit();
?>
