<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_habitacion = $_GET['id'];
    
    // Ejecutar la consulta para eliminar la habitación con el ID proporcionado
    $sql = "DELETE FROM habitacion WHERE Id_hab = $id_habitacion";
    if ($conn->query($sql) === TRUE) {
        // Redirigir al index después de eliminar
        header("Location: index_habitacion.php");
        exit();
    } else {
        echo "Error al eliminar la habitación: " . $conn->error;
        exit();
    }
} else {
    echo "No se proporcionó un ID de habitación válido";
    exit();
}
?>
