<?php
session_start(); // Iniciar la sesión

// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Consulta SQL para seleccionar todos los registros de la tabla habitacion con el nombre del tipo de habitación
$sql = "SELECT habitacion.*, tipo_habitacion.nombre_tipo 
        FROM habitacion 
        JOIN tipo_habitacion ON habitacion.tipo_hab = tipo_habitacion.id_tipo";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Habitaciones</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
            padding: 15px;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <?php include 'D:\integrador\cop_modif\sidebar.php'; ?>

    <div class="content">
        <h1>Lista de Habitaciones</h1>
        
        <?php
        // Mostrar mensajes de éxito o error si existen
        if (isset($_SESSION['success'])) {
            echo "<p style='color: green;'>" . $_SESSION['success'] . "</p>";
            unset($_SESSION['success']); // Eliminar el mensaje de éxito después de mostrarlo
        }
        if (isset($_SESSION['error'])) {
            echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']); // Eliminar el mensaje de error después de mostrarlo
        }
        ?>
        
        <a href="create_habitacion.php"><button class="btn btn-primary mb-3">Añadir Habitación</button></a>
        <?php if ($resultado->num_rows > 0): ?>
        <!-- Si hay registros en la tabla -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Precio por Noche</th>
                    <th>Disponible</th>
                  <!--   <th>Foto</th> -->
                    <th>Tipo de Habitación</th>
                    <th>Capacidad</th>
                   <!--  <th>ID del Hotel</th> -->
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Id_hab']; ?></td>
                    <td><?php echo $row['Precio_noche_hab']; ?></td>
                    <td><?php echo $row['Disponible'] ? 'Sí' : 'No'; ?></td>
                   <!-- <td><?php echo $row['foto_hab']; ?></td> -->
                    <td><?php echo $row['nombre_tipo']; ?></td>
                    <td><?php echo $row['capacidad_hab']; ?></td>
                <!--    <td><?php echo $row['Id_hot']; ?></td>-->
                    <td>
                        <a href="edit_habitacion.php?id=<?php echo $row['Id_hab']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="delete_habitacion.php?id=<?php echo $row['Id_hab']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <!-- Si no hay registros en la tabla -->
        <p>No hay habitaciones registradas.</p>
        <?php endif; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
