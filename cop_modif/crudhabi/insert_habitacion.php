<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';

    // Recibir datos del formulario
    $precio = $_POST['precio'];
    $disponible = isset($_POST['disponible']) ? 1 : 0; // Convertir el checkbox a 1 si está marcado, 0 si no
    $tipo = $_POST['tipo'];
    $piso = $_POST['piso'];
    $capacidad = $_POST['capacidad'];

    // Query de inserción
    $sql = "INSERT INTO habitacion (Precio_noche_hab, Disponible, tipo_hab, Id_piso, capacidad_hab) VALUES ('$precio', '$disponible', '$tipo', '$piso', '$capacidad')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Habitación agregada correctamente";
    } else {
        echo "Error al agregar la habitación: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Redirigir si se intenta acceder directamente al script sin enviar datos del formulario
    header("Location: index_habitacion.php");
    exit();
}
?>
