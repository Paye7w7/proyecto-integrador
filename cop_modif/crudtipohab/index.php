<?php
include 'conexion.php';

// Consulta para obtener la lista de tipos de habitación
$sql = "SELECT * FROM tipo_habitacion";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tipos de Habitación</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'D:\integrador\cop_modif\sidebar.php'; ?>
<div class="container" style="margin-left: 250px; padding: 20px;">
    <h1 class="my-4">Lista de Tipos de Habitación</h1>
    <a href="create_tipo_habitacion.php" class="btn btn-primary mb-3">Agregar Nuevo Tipo de Habitación</a>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Servicio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_tipo'] . "</td>";
                    echo "<td>" . $row['nombre_tipo'] . "</td>";
                    echo "<td>" . $row['descripcion_tipo'] . "</td>";
                    echo "<td>" . $row['servicio'] . "</td>";
                    echo "<td>" . $row['estado'] . "</td>";
                    echo "<td>";
                    echo "<a href='edit_tipo_habitacion.php?id_tipo=" . $row['id_tipo'] . "' class='btn btn-warning btn-sm'>Editar</a> ";
                    echo "<a href='delete_tipo_habitacion.php?id_tipo=" . $row['id_tipo'] . "' class='btn btn-danger btn-sm'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>No se encontraron tipos de habitación.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Enlace a Bootstrap JS y dependencias -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
