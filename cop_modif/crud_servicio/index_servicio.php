<?php
session_start(); // Iniciar la sesión

// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Consulta SQL para seleccionar todos los registros de la tabla servicio
$sql = "SELECT * FROM servicio";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Servicios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
            padding: 15px;
            background-color: #343a40;
            color: #fff;
        }
        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
            width: calc(100% - 270px);
        }
        .container {
            margin-top: 50px;
        }
        .btn-custom {
            background-color: #007bff;
            color: #fff;
            border-radius: 50px;
            padding: 10px 20px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }
        .table {
            border-radius: 5px;
            overflow: hidden;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <?php include 'D:\integrador\cop_modif\sidebar.php'; ?>

    <div class="content">
        <div class="container">
            <h1 class="text-center mb-4">Lista de Servicios</h1>
            
            <?php
            // Mostrar mensajes de éxito o error si existen
            if (isset($_SESSION['success'])) {
                echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
                unset($_SESSION['success']); // Eliminar el mensaje de éxito después de mostrarlo
            }
            if (isset($_SESSION['error'])) {
                echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
                unset($_SESSION['error']); // Eliminar el mensaje de error después de mostrarlo
            }
            ?>
            
            <a href="create_servicio.php" class="btn btn-primary mb-3">Añadir Servicio</a>
            <?php if ($resultado->num_rows > 0): ?>
            <!-- Si hay registros en la tabla -->
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                     <!--   <th>Foto</th>-->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['Id_ser']; ?></td>
                        <td><?php echo $row['Nombre_ser']; ?></td>
                        <td><?php echo $row['tipo_ser']; ?></td>
                        <td><?php echo $row['Descripcion_ser']; ?></td>
                        <td><?php echo 'Bs ' . number_format($row['Precio_ser'], 2); ?></td>
                    <!--    <td><?php echo $row['foto_ser']; ?></td> -->
                        <td>
                            <a href="edit_servicio.php?id=<?php echo $row['Id_ser']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="delete_servicio.php?id=<?php echo $row['Id_ser']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <?php else: ?>
            <!-- Si no hay registros en la tabla -->
            <p>No hay servicios registrados.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
