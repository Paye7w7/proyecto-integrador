<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_piso = $_POST['numero_piso'];
    $descripcion = $_POST['descripcion'];
    $numero_habitaciones = $_POST['numero_habitaciones'];
    $capacidad_total = $_POST['capacidad_total'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO piso_habitacion (numero_piso, descripcion, numero_habitaciones, capacidad_total, estado) 
            VALUES ('$numero_piso', '$descripcion', '$numero_habitaciones', '$capacidad_total', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo piso de habitaciones agregado exitosamente";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
