<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cargo_id']) && isset($_GET['sub_admin_id'])) {
    $cargo_id = $_GET['cargo_id'];
    $sub_admin_id = $_GET['sub_admin_id'];

    $sql = "UPDATE car_sub SET deleted_at=NOW() WHERE cargo_id='$cargo_id' AND sub_admin_id='$sub_admin_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Relación eliminada lógicamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Relación Cargo-Sub Administrador</title>
</head>
<body>
    <p>La relación ha sido eliminada lógicamente.</p>
    <button onclick="window.location.href='index.php'">Volver</button>
</body>
</html>
