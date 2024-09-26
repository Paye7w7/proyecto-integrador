<?php
include 'conexion.php';

$sql = "SELECT car_sub.cargo_id, car_sub.sub_admin_id, car_sub.fecha_asignacion, cargo.nombre AS cargo_nombre, sub_administrador.nombre AS sub_admin_nombre 
        FROM car_sub 
        JOIN cargo ON car_sub.cargo_id = cargo.id 
        JOIN sub_administrador ON car_sub.sub_admin_id = sub_administrador.id 
        WHERE car_sub.deleted_at IS NULL";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Relaciones Cargo-Sub Administrador</title>
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
            margin-top: 50px;
        }
        .btn-container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include 'D:\integrador\cop_modif\sidebar.php'; ?>

    <div class="content">
        <div class="container mt-5">
            <h1>Gestión de Relaciones Cargo-Sub Administrador</h1>
            <div class="btn-container">
                <a href="create_car_sub.php" class="btn btn-primary">Crear Nueva Relación</a>
                <a href="deleted_car_sub.php" class="btn btn-secondary">Ver Borrados Lógicamente</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Cargo</th>
                        <th>Sub Administrador</th>
                        <th>Fecha de Asignación</th>
                        <th>Acciones</th>
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
                                    <td>
                                        <a href='view_car_sub.php?cargo_id={$row['cargo_id']}&sub_admin_id={$row['sub_admin_id']}' class='btn btn-info'>Ver</a>
                                        <a href='update_car_sub.php?cargo_id={$row['cargo_id']}&sub_admin_id={$row['sub_admin_id']}' class='btn btn-warning'>Editar</a>
                                        <a href='delete_car_sub.php?cargo_id={$row['cargo_id']}&sub_admin_id={$row['sub_admin_id']}' class='btn btn-danger'>Eliminar</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No hay relaciones encontradas</td></tr>";
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
