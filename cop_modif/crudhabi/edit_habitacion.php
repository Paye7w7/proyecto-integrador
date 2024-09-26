<?php
include 'conexion.php';
session_start(); // Iniciar la sesión

// Obtener el ID de la habitación a editar y los datos de la habitación
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_habitacion = $_GET['id'];
    
    // Consulta SQL para obtener los datos de la habitación
    $sql = "SELECT * FROM habitacion WHERE Id_hab=$id_habitacion";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        $_SESSION['error'] = "No se encontró la habitación a editar.";
        header("Location: index_habitacion.php");
        exit();
    }
}

// Consulta para obtener la lista de tipos de habitación
$sql_tipos_habitacion = "SELECT id_tipo, nombre_tipo FROM tipo_habitacion";
$resultado_tipos_habitacion = $conn->query($sql_tipos_habitacion);

// Consulta para obtener la lista de capacidades totales de los pisos de habitación
$sql_capacidades = "SELECT DISTINCT capacidad_total FROM piso_habitacion";
$resultado_capacidades = $conn->query($sql_capacidades);

// Manejar la actualización del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_habitacion = $_POST['id_habitacion'];
    $precio_noche = $_POST['precio_noche'];
    $disponible = isset($_POST['disponible']) ? 1 : 0;
    $foto = $_POST['foto'];
    $tipo_habitacion = $_POST['tipo_habitacion'];
    $capacidad = $_POST['capacidad'];

    // Validación del lado del servidor
    if (!is_numeric($precio_noche) || !is_numeric($capacidad) || empty($foto) || empty($tipo_habitacion)) {
        $_SESSION['error'] = "Por favor, ingrese valores válidos.";
        header("Location: edit_habitacion.php?id=$id_habitacion");
        exit();
    }

    // Consulta SQL para actualizar la habitación en la base de datos
    $sql_update = "UPDATE habitacion SET 
                    Precio_noche_hab='$precio_noche', 
                    Disponible=$disponible, 
                    foto_hab='$foto', 
                    tipo_hab='$tipo_habitacion', 
                    capacidad_hab='$capacidad' 
                  WHERE Id_hab=$id_habitacion";

    if ($conn->query($sql_update) === TRUE) {
        $_SESSION['success'] = "Habitación actualizada correctamente.";
        header("Location: index_habitacion.php");
        exit();
    } else {
        $_SESSION['error'] = "Error al actualizar la habitación: " . $conn->error;
        header("Location: index_habitacion.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Habitación</title>
</head>
<body>
<?php include 'D:\integrador\cop_modif\sidebar.php'; ?>
<div style="margin-left: 250px; padding: 20px;">
    <h1>Editar Habitación</h1>
    <?php if (isset($row)): ?>
    <form method="post" action="edit_habitacion.php">
        <input type="hidden" name="id_habitacion" value="<?php echo $row['Id_hab']; ?>">
        <label for="precio_noche">Precio por Noche:</label>
        <input type="number" id="precio_noche" name="precio_noche" value="<?php echo $row['Precio_noche_hab']; ?>" required><br>
        <label for="disponible">Disponible:</label>
        <input type="checkbox" id="disponible" name="disponible" <?php if ($row['Disponible'] == 1) echo "checked"; ?>><br>
        <label for="foto">Foto:</label>
        <input type="text" id="foto" name="foto" value="<?php echo $row['foto_hab']; ?>" required><br>
        <label for="tipo_habitacion">Tipo de Habitación:</label>
        <select id="tipo_habitacion" name="tipo_habitacion" required>
            <?php
            if ($resultado_tipos_habitacion->num_rows > 0) {
                while($fila_tipo_habitacion = $resultado_tipos_habitacion->fetch_assoc()) {
                    $selected = ($fila_tipo_habitacion['id_tipo'] == $row['tipo_hab']) ? "selected" : "";
                    echo "<option value='" . $fila_tipo_habitacion['id_tipo'] . "' $selected>" . $fila_tipo_habitacion['nombre_tipo'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay tipos de habitación disponibles</option>";
            }
            ?>
        </select><br>
        <label for="capacidad">Capacidad:</label>
        <select id="capacidad" name="capacidad" required>
            <?php
            if ($resultado_capacidades->num_rows > 0) {
                while($fila_capacidad = $resultado_capacidades->fetch_assoc()) {
                    $selected = ($fila_capacidad['capacidad_total'] == $row['capacidad_hab']) ? "selected" : "";
                    echo "<option value='" . $fila_capacidad['capacidad_total'] . "' $selected>" . $fila_capacidad['capacidad_total'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay capacidades disponibles</option>";
            }
            ?>
        </select><br>
        <input type="submit" value="Guardar Cambios">
    </form>
    <?php else: ?>
    <p>No se encontró la habitación a editar.</p>
    <?php endif; ?>
</body>
</html>
