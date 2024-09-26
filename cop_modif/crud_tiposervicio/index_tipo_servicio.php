<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Consulta SQL para seleccionar todos los tipos de servicio
$sql = "SELECT * FROM tipo_servicio";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tipos de Servicio</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo adicional personalizado */
        .action-links a {
            margin-right: 10px;
        }
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
    </style>
</head>
<body>
    <?php include 'D:\integrador\cop_modif\sidebar.php'; ?>

    <div class="content">
        <div class="container mt-5">
            <h1>Lista de Tipos de Servicio</h1>
            <a href="create_tipo_servicio.php" class="btn btn-primary mb-3">Añadir Tipo de Servicio</a>
            <?php if ($resultado->num_rows > 0): ?>
            <!-- Si hay registros en la tabla -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Id_tipo_ser']); ?></td>
                        <td><?php echo htmlspecialchars($row['Nombre_tipo']); ?></td>
                        <td><?php echo htmlspecialchars($row['Descripcion']); ?></td>
                        <td class="action-links">
                            <a href="edit_tipo_servicio.php?id=<?php echo $row['Id_tipo_ser']; ?>" class="btn btn-info">Editar</a>
                            <a href="delete_tipo_servicio.php?id=<?php echo $row['Id_tipo_ser']; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php else: ?>
            <!-- Si no hay registros en la tabla -->
            <p>No hay tipos de servicio registrados.</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Bootstrap JS y jQuery (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
