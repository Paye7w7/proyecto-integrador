<?php
include 'conexion.php';

// Consulta para obtener la lista de pisos de habitaciones eliminados
$sql = "SELECT * FROM piso_habitacion WHERE deleted = TRUE";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borradores de Pisos de Habitaciones</title>
</head>
<body>
<?php include 'D:\integrador\cop_modif\sidebar.php'; ?>
<div style="margin-left: 250px; padding: 20px;">
    <h1>Borradores de Pisos de Habitaciones</h1>
    <table border="1">
        <tr>
            <th>ID Piso</th>
            <th>Número de Piso</th>
            <th>Número de Habitaciones</th>
            <th>Capacidad Total</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
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
                echo "<a href='restore_piso.php?id_piso=" . $row['id_piso'] . "'>Restaurar</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No se encontraron pisos de habitaciones eliminados.</td></tr>";
        }
        ?>
    </table>
    <a href="index.php">Volver</a>
</body>
</html>
