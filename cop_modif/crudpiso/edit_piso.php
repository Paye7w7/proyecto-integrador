<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_piso'])) {
    $id_piso = $_GET['id_piso'];

    // Consulta para obtener los datos del piso seleccionado
    $sql = "SELECT * FROM piso_habitacion WHERE id_piso = $id_piso";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Piso no encontrado.";
        exit();
    }

    // Consulta para obtener todas las habitaciones
    $sql_habitaciones = "SELECT Id_hab, tipo_hab FROM habitacion";
    $result_habitaciones = $conn->query($sql_habitaciones);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_piso'])) {
    $id_piso = $_POST['id_piso'];
    $numero_piso = $_POST['numero_piso'];
    $descripcion = $_POST['descripcion'];
    $numero_habitaciones = $_POST['numero_habitaciones'];
    $capacidad_total = $_POST['capacidad_total'];
    $estado = $_POST['estado'];
    $id_hab = isset($_POST['id_hab']) ? $_POST['id_hab'] : null;

    // Validar que el Id_hab sea válido
    if ($id_hab !== null) {
        $sql_check_hab = "SELECT Id_hab FROM habitacion WHERE Id_hab = $id_hab";
        $result_check_hab = $conn->query($sql_check_hab);

        if ($result_check_hab->num_rows == 0) {
            echo "El ID de la habitación no es válido.";
            exit();
        }
    }

    // Consulta para actualizar los datos del piso
    $sql = "UPDATE piso_habitacion 
            SET numero_piso='$numero_piso', descripcion='$descripcion', 
                numero_habitaciones='$numero_habitaciones', capacidad_total='$capacidad_total', 
                estado='$estado', Id_hab='$id_hab' 
            WHERE id_piso='$id_piso'";

    if ($conn->query($sql) === TRUE) {
        echo "Piso actualizado exitosamente";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Piso de Habitaciones</title>
</head>
<body>
<?php include 'D:\integrador\cop_modif\sidebar.php'; ?>
<div style="margin-left: 250px; padding: 20px;">
    <h1>Editar Piso de Habitaciones</h1>
    <form action="edit_piso.php" method="POST">
        <input type="hidden" name="id_piso" value="<?php echo $row['id_piso']; ?>">
        <label for="numero_piso">Número de Piso:</label>
        <input type="number" id="numero_piso" name="numero_piso" value="<?php echo $row['numero_piso']; ?>" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"><?php echo $row['descripcion']; ?></textarea>
        <br>
        <label for="numero_habitaciones">Número de Habitaciones:</label>
        <input type="number" id="numero_habitaciones" name="numero_habitaciones" value="<?php echo $row['numero_habitaciones']; ?>" required>
        <br>
        <label for="capacidad_total">Capacidad Total:</label>
        <input type="number" id="capacidad_total" name="capacidad_total" value="<?php echo $row['capacidad_total']; ?>" required>
        <br>
        <label for="estado">Estado:</label>
        <select id="estado" name="estado">
            <option value="Activo" <?php if($row['estado'] == 'Activo') echo 'selected'; ?>>Activo</option>
            <option value="Inactivo" <?php if($row['estado'] == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
        </select>
        <br>
        <label for="id_hab">ID Habitación:</label>
        <select id="id_hab" name="id_hab">
            <option value="">Seleccionar Habitación</option>
            <?php
            if ($result_habitaciones->num_rows > 0) {
                while($hab_row = $result_habitaciones->fetch_assoc()) {
                    $selected = $hab_row['Id_hab'] == $row['Id_hab'] ? 'selected' : '';
                    echo "<option value='" . $hab_row['Id_hab'] . "' $selected>" . $hab_row['tipo_hab'] . "</option>";
                }
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Actualizar Piso">
    </form>
    <a href="index.php">Volver</a>

</body>
</html>
