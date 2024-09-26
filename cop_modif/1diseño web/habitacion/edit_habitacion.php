<?php
include 'conexion.php';

if (isset($_GET['Id_hab'])) {
    $Id_hab = $_GET['Id_hab'];

    // Obtener los datos actuales de la habitación
    $sql = "SELECT * FROM habitacion WHERE Id_hab = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $Id_hab);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Habitación no encontrada";
        exit();
    }

    // Obtener los tipos de habitación para el desplegable
    $sql_tipos = "SELECT * FROM tipo_habitacion WHERE estado = 'Activo'";
    $result_tipos = $conn->query($sql_tipos);
} else {
    echo "ID de habitación no especificado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Precio_noche_hab = $_POST['Precio_noche_hab'];
    $Disponible = $_POST['Disponible'];
    $foto_hab = $_POST['foto_hab'];
    $tipo_hab = $_POST['tipo_hab'];
    $capacidad_hab = $_POST['capacidad_hab'];
    $Id_hot = $_POST['Id_hot'];

    $sql = "UPDATE habitacion SET Precio_noche_hab = ?, Disponible = ?, foto_hab = ?, tipo_hab = ?, capacidad_hab = ?, Id_hot = ? WHERE Id_hab = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('disiiii', $Precio_noche_hab, $Disponible, $foto_hab, $tipo_hab, $capacidad_hab, $Id_hot, $Id_hab);

    if ($stmt->execute()) {
        echo "Habitación actualizada exitosamente";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
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
    <h1>Editar Habitación</h1>
    <form action="" method="POST">
        <label for="Precio_noche_hab">Precio por Noche:</label>
        <input type="number" id="Precio_noche_hab" name="Precio_noche_hab" step="0.01" value="<?php echo $row['Precio_noche_hab']; ?>" required>
        <br>
        <label for="Disponible">Disponible:</label>
        <select id="Disponible" name="Disponible">
            <option value="1" <?php if ($row['Disponible']) echo 'selected'; ?>>Sí</option>
            <option value="0" <?php if (!$row['Disponible']) echo 'selected'; ?>>No</option>
        </select>
        <br>
        <label for="foto_hab">Foto (URL):</label>
        <input type="text" id="foto_hab" name="foto_hab" value="<?php echo $row['foto_hab']; ?>">
        <br>
        <label for="tipo_hab">Tipo de Habitación:</label>
        <select id="tipo_hab" name="tipo_hab" required>
            <?php
            if ($result_tipos->num_rows > 0) {
                while ($row_tipos = $result_tipos->fetch_assoc()) {
                    echo "<option value='" . $row_tipos['id_tipo'] . "' " . ($row_tipos['id_tipo'] == $row['tipo_hab'] ? 'selected' : '') . ">" . $row_tipos['nombre_tipo'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay tipos de habitación disponibles</option>";
            }
            ?>
        </select>
        <br>
        <label for="capacidad_hab">Capacidad:</label>
        <input type="number" id="capacidad_hab" name="capacidad_hab" value="<?php echo $row['capacidad_hab']; ?>" required>
        <br>
        <label for="Id_hot">ID del Hotel:</label>
        <input type="number" id="Id_hot" name="Id_hot" value="<?php echo $row['Id_hot']; ?>" required>
        <br>
        <input type="submit" value="Actualizar Habitación">
    </form>
    <a href="index.php">Volver</a>
</body>
</html>
