<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Obtener el ID del tipo de servicio a eliminar
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_tipo_servicio = $_GET['id'];
    
    // Consulta SQL para eliminar el tipo de servicio de la base de datos
    $sql = "DELETE FROM tipo_servicio WHERE Id_tipo_ser=$id_tipo_servicio";

    if ($conn->query($sql) === TRUE) {
        echo "Tipo de servicio eliminado correctamente.";
        // Redireccionar al index
        header("Location: index_tipo_servicio.php");
        exit();
    } else {
        echo "Error al eliminar el tipo de servicio: " . $conn->error;
    }
} else {
    echo "ID de tipo de servicio no especificado.";
}
?>
