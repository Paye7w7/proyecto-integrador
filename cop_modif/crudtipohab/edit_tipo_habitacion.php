<?php
include 'conexion.php';

if (isset($_GET['id_tipo'])) {
    $id_tipo = $_GET['id_tipo'];

    // Obtener los datos actuales del tipo de habitación
    $sql = "SELECT * FROM tipo_habitacion WHERE id_tipo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_tipo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Tipo de habitación no encontrado";
        exit();
    }
} else {
    echo "ID de tipo de habitación no especificado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_tipo = $_POST['nombre_tipo'];
    $descripcion_tipo = $_POST['descripcion_tipo'];
    $servicio = $_POST['servicio'];
    $estado = $_POST['estado'];

    $sql = "UPDATE tipo_habitacion SET nombre_tipo = ?, descripcion_tipo = ?, servicio = ?, estado = ? WHERE id_tipo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $nombre_tipo, $descripcion_tipo, $servicio, $estado, $id_tipo);

    if ($stmt->execute()) {
        echo "Tipo de habitación actualizado exitosamente";
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
    <title>Editar Tipo de Habitación</title>
</head>
<body>
<?php include 'D:\integrador\cop_modif\sidebar.php'; ?>
<div style="margin-left: 250px; padding: 20px;">
    <h1>Editar Tipo de Habitación</h1>
    <form action="" method="POST">
        <label for="nombre_tipo">Nombre del Tipo:</label>
        <input type="text" id="nombre_tipo" name="nombre_tipo" value="<?php echo $row['nombre_tipo']; ?>" required>
        <br>
        <label for="descripcion_tipo">Descripción:</label>
        <textarea id="descripcion_tipo" name="descripcion_tipo"><?php echo $row['descripcion_tipo']; ?></textarea>
        <br>
        <label for="servicio">Servicio:</label>
        <input type="text" id="servicio" name="servicio" value="<?php echo $row['servicio']; ?>">
        <br>
        <label for="estado">Estado:</label>
        <select id="estado" name="estado">
            <option value="Activo" <?php if ($row['estado'] == 'Activo') echo 'selected'; ?>>Activo</option>
            <option value="Inactivo" <?php if ($row['estado'] == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
        </select>
        <br>
        <input type="submit" value="Actualizar Tipo de Habitación">
    </form>
    <a href="index.php">Volver</a>
</body>
</html>
