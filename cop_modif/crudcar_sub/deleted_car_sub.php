<?php
include 'conexion.php';

$sql = "SELECT car_sub.cargo_id, car_sub.sub_admin_id, car_sub.fecha_asignacion, cargo.nombre AS cargo_nombre, sub_administrador.nombre AS sub_admin_nombre 
        FROM car_sub 
        JOIN cargo ON car_sub.cargo_id = cargo.id 
        JOIN sub_administrador ON car_sub.sub_admin_id = sub_administrador.id 
        WHERE car_sub.deleted_at IS NOT NULL";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relaciones Eliminadas Lógicamente</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo adicional personalizado */
        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
            padding: 15px;
            background-color: #f8f9fa;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <?php include 'D:\integrador\cop_modif\sidebar.php'; ?>

    <div class="content">
        <div class="container">
            <h1>Relaciones Eliminadas Lógicamente</h1>
            <button onclick="window.location.href='index.php'" class="btn btn-primary">Volver a la Gestión</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>Cargo</th>
                        <th>Sub Administrador</th>
                        <th>Fecha de Asignación</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['cargo_nombre']}</td>
                                    <td>{$row['sub_admin_nombre']}</td>
                                    <td>{$row['fecha_asignacion']}</td>
                                    <td><a href='restore_car_sub.php?cargo_id={$row['cargo_id']}&sub_admin_id={$row['sub_admin_id']}' class='btn btn-info'>Restaurar</a></td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No hay registros eliminados</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS y jQuery (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
