<?php
include 'conexion.php';

// Consulta para obtener la lista de pisos de habitaciones que no han sido eliminados
$sql = "SELECT * FROM piso_habitacion WHERE deleted = FALSE";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pisos de Habitaciones</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para evitar que la tabla se solape con el sidebar */
        body {
            display: flex;
        }
    </style>
</head>
<body>
<?php include 'D:\integrador\cop_modif\sidebar.php'; ?>

    <div class="container" style="margin-left: 250px; padding: 20px;">
        <h1 class="my-4">Lista de Pisos de Habitaciones</h1>
        <a href="create_piso.php" class="btn btn-primary mb-3">Agregar Nuevo Piso de Habitaciones</a>
        <a href="borradores.php" class="btn btn-secondary mb-3">Borradores</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>ID Piso</th>
                        <th>Número de Piso</th>
                        <th>Número de Habitaciones</th>
                        <th>Capacidad Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id_piso'] . "</td>";
                            echo "<td>" . $row['numero_piso'] . "</td>";
                            echo "<td>" . $row['numero_habitaciones'] . "</td>";
                            echo "<td>" . $row['capacidad_total'] . "</td>";
                            echo "<td>" . $row['estado'] . "</td>";
                            echo "<td>";
                            echo "<a href='view_habitaciones.php?id_piso=" . $row['id_piso'] . "' class='btn btn-info btn-sm'>Ver Habitaciones</a> ";
                            echo "<a href='edit_piso.php?id_piso=" . $row['id_piso'] . "' class='btn btn-warning btn-sm'>Editar</a> ";
                            echo "<a href='delete_piso.php?id_piso=" . $row['id_piso'] . "' class='btn btn-danger btn-sm'>Eliminar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>No se encontraron pisos de habitaciones.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Enlace a Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
