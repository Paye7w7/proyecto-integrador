<?php
include 'conexion.php';

// Consulta para obtener la lista de cargos
$sql = "SELECT * FROM cargo";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cargos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
            padding: 15px;
            background-color: #f0f0f0;
        }
        .container {
            margin-left: 270px; /* Ancho del sidebar + espacio adicional */
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 4px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <?php include 'D:\integrador\cop_modif\sidebar.php'; ?>
    <div style="margin-left: 250px; padding: 20px;">
    <div class="container">
        <h1>Lista de Cargos</h1>
        <a href="create_cargo.php" class="btn">Agregar Nuevo Cargo</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['descripcion'] . "</td>";
                    echo "<td>";
                    echo "<a href='update_cargo.php?id=" . $row['id'] . "' class='btn'>Editar</a> ";
                    echo "<a href='delete_cargo.php?id=" . $row['id'] . "' class='btn btn-danger'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No se encontraron cargos.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
