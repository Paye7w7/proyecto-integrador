<?php
include 'conexion.php';

// Consulta para obtener la lista de tipos de habitación
$sql_tipos_habitacion = "SELECT id_tipo, nombre_tipo FROM tipo_habitacion";
$resultado_tipos_habitacion = $conn->query($sql_tipos_habitacion);

// Consulta para obtener la lista de pisos de habitación
$sql_pisos_habitacion = "SELECT id_piso, numero_piso, numero_habitaciones, capacidad_total FROM piso_habitacion";
$resultado_pisos_habitacion = $conn->query($sql_pisos_habitacion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Habitación</title>
</head>
<body>
<?php include 'D:\integrador\cop_modif\sidebar.php'; ?>
<div style="margin-left: 250px; padding: 20px;">
    <h1>Agregar Nueva Habitación</h1>
    <form method="post" action="insert_habitacion.php">
        <label for="precio">Precio por Noche:</label>
        <input type="number" id="precio" name="precio" required>
        <br>
        <label for="disponible">Disponible:</label>
        <input type="checkbox" id="disponible" name="disponible" checked>
        <br>
        <label for="tipo">Tipo de Habitación:</label>
        <select id="tipo" name="tipo" required>
            <option value="">Seleccione un tipo de habitación</option>
            <?php
            if ($resultado_tipos_habitacion->num_rows > 0) {
                while($fila_tipo_habitacion = $resultado_tipos_habitacion->fetch_assoc()) {
                    echo "<option value='" . $fila_tipo_habitacion['id_tipo'] . "'>" . $fila_tipo_habitacion['nombre_tipo'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay tipos de habitación disponibles</option>";
            }
            ?>
        </select>
        <br>
        <label for="piso">Piso de Habitación:</label>
        <select id="piso" name="piso" required>
            <option value="">Seleccione un piso de habitación</option>
            <?php
            if ($resultado_pisos_habitacion->num_rows > 0) {
                while($fila_piso_habitacion = $resultado_pisos_habitacion->fetch_assoc()) {
                    echo "<option value='" . $fila_piso_habitacion['id_piso'] . "'>Piso " . $fila_piso_habitacion['numero_piso'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay pisos de habitación disponibles</option>";
            }
            ?>
        </select>
        <br>
        <label for="capacidad">Capacidad Total:</label>
<select id="capacidad" name="capacidad" required>
    <option value="">Seleccione la capacidad total</option>
    <?php
    // Consulta para obtener la lista de capacidades totales de los pisos de habitación
    $sql_capacidades = "SELECT DISTINCT capacidad_total FROM piso_habitacion";
    $resultado_capacidades = $conn->query($sql_capacidades);

    if ($resultado_capacidades->num_rows > 0) {
        while($fila_capacidad = $resultado_capacidades->fetch_assoc()) {
            echo "<option value='" . $fila_capacidad['capacidad_total'] . "'>" . $fila_capacidad['capacidad_total'] . "</option>";
        }
    } else {
        echo "<option value=''>No hay capacidades disponibles</option>";
    }
    ?>
</select>

        <br>
        <label for="num_habitaciones">Número de Habitaciones:</label>
        <select id="num_habitaciones" name="num_habitaciones" required>
            <option value="">Seleccione el número de habitaciones</option>
            <?php
            // Reiniciamos el puntero del resultado para recorrerlo nuevamente
            $resultado_pisos_habitacion->data_seek(0);
            if ($resultado_pisos_habitacion->num_rows > 0) {
                while($fila_piso_habitacion = $resultado_pisos_habitacion->fetch_assoc()) {
                    echo "<option value='" . $fila_piso_habitacion['numero_habitaciones'] . "'>" . $fila_piso_habitacion['numero_habitaciones'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay pisos de habitación disponibles</option>";
            }
            ?>
        </select>
        <br>
        <!-- Agregar más campos según sea necesario -->
        <br>
        <input type="submit" value="Agregar Habitación">
    </form>
    <a href="index_habitacion.php">Volver</a>
</body>
</html>
