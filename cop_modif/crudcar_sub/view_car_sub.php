<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cargo_id']) && isset($_GET['sub_admin_id'])) {
    $cargo_id = $_GET['cargo_id'];
    $sub_admin_id = $_GET['sub_admin_id'];
    $sql = "SELECT car_sub.cargo_id, car_sub.sub_admin_id, car_sub.fecha_asignacion, cargo.nombre AS cargo_nombre, sub_administrador.nombre AS sub_admin_nombre, cargo.descripcion 
            FROM car_sub 
            JOIN cargo ON car_sub.cargo_id = cargo.id 
            JOIN sub_administrador ON car_sub.sub_admin_id = sub_administrador.id 
            WHERE car_sub.cargo_id=$cargo_id AND car_sub.sub_admin_id=$sub_admin_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Relación no encontrada";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Relación Cargo-Sub Administrador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        p {
            margin-bottom: 10px;
            color: #666;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($row)): ?>
            <h1>Detalle de la Relación</h1>
            <p><strong>Cargo:</strong> <?php echo $row['cargo_nombre']; ?></p>
            <p><strong>Descripción del Cargo:</strong> <?php echo $row['descripcion']; ?></p>
            <p><strong>Sub Administrador:</strong> <?php echo $row['sub_admin_nombre']; ?></p>
            <p><strong>Fecha de Asignación:</strong> <?php echo $row['fecha_asignacion']; ?></p>
            <button onclick="window.location.href='index.php'">Volver</button>
        <?php endif; ?>
    </div>
</body>
</html>
