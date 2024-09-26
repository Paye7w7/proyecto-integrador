<?php
include 'conexion.php';

// Consulta para obtener la lista de habitaciones junto con la información del tipo y del piso
$sql = "SELECT h.*, t.nombre_tipo, p.numero_piso, p.capacidad_total 
        FROM habitacion h
        JOIN tipo_habitacion t ON h.tipo_hab = t.id_tipo
        JOIN piso_habitacion p ON h.id_piso = p.id_piso";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Habitaciones</title>
</head>
<body>
    <h1>Lista de Habitaciones</h1>
    <table border="1">
        <tr>
            <th>ID Habitación</th>
            <th>Precio por Noche</th>
            <th>Disponible</th>
            <th>Foto</th>
            <th>Tipo de Habitación</th>
            <th>Capacidad</th>
            <th>Número de Piso</th>
            <th>Capacidad Total del Piso</th>
            <th>Acciones</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Id_hab'] . "</td>";
                echo "<td>" . $row['Precio_noche_hab'] . "</td>";
                echo "<td>" . ($row['Disponible'] ? 'Sí' : 'No') . "</td>";
                echo "<td><img src='" . $row['foto_hab'] . "' width='100'></td>";
                echo "<td>" . $row['nombre_tipo'] . "</td>";
                echo "<td>" . $row['capacidad_hab'] . "</td>";
                echo "<td>" . $row['numero_piso'] . "</td>";
                echo "<td>" . $row['capacidad_total'] . "</td>";
                echo "<td>";
                echo "<a href='edit_habitacion.php?Id_hab=" . $row['Id_hab'] . "'>Editar</a> ";
                echo "<a href='delete_habitacion.php?Id_hab=" . $row['Id_hab'] . "'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No se encontraron habitaciones.</td></tr>";
        }
        ?>
    </table>
    <a href="create_habitacion.php">Agregar Nueva Habitación</a>
</body>
</html>
