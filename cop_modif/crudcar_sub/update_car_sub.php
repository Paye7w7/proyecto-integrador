<?php
include 'conexion.php';

// Obtener datos de cargo y sub_administrador
$cargo_sql = "SELECT * FROM cargo";
$cargo_result = $conn->query($cargo_sql);

$sub_admin_sql = "SELECT * FROM sub_administrador";
$sub_admin_result = $conn->query($sub_admin_sql);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cargo_id']) && isset($_GET['sub_admin_id'])) {
    $cargo_id = $_GET['cargo_id'];
    $sub_admin_id = $_GET['sub_admin_id'];
    $sql = "SELECT car_sub.*, cargo.descripcion FROM car_sub JOIN cargo ON car_sub.cargo_id = cargo.id WHERE car_sub.cargo_id=$cargo_id AND car_sub.sub_admin_id=$sub_admin_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Relación no encontrada";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_cargo_id = $_POST['old_cargo_id'];
    $old_sub_admin_id = $_POST['old_sub_admin_id'];
    $cargo_id = $_POST['cargo_id'];
    $sub_admin_id = $_POST['sub_admin_id'];
    $fecha_asignacion = $_POST['fecha_asignacion'];

    $sql = "UPDATE car_sub SET cargo_id='$cargo_id', sub_admin_id='$sub_admin_id', fecha_asignacion='$fecha_asignacion' WHERE cargo_id='$old_cargo_id' AND sub_admin_id='$old_sub_admin_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Relación actualizada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Relación Cargo-Sub Administrador</title>
    <script>
        function updateDescription() {
            var cargoSelect = document.getElementById('cargo_id');
            var selectedOption = cargoSelect.options[cargoSelect.selectedIndex];
            var description = selectedOption.getAttribute('data-description');
            document.getElementById('descripcion').value = description;
        }
    </script>
</head>
<body>
    
    <?php if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($row)): ?>
        <form method="post" action="update_car_sub.php">
            <input type="hidden" name="old_cargo_id" value="<?php echo $row['cargo_id']; ?>">
            <input type="hidden" name="old_sub_admin_id" value="<?php echo $row['sub_admin_id']; ?>">
            
            <label for="cargo_id">Cargo:</label>
            <select name="cargo_id" id="cargo_id" onchange="updateDescription()" required>
                <option value="">Seleccionar Cargo</option>
                <?php
                if ($cargo_result->num_rows > 0) {
                    while($cargo_row = $cargo_result->fetch_assoc()) {
                        $selected = $cargo_row['id'] == $row['cargo_id'] ? 'selected' : '';
                        echo "<option value='" . $cargo_row['id'] . "' data-description='" . $cargo_row['descripcion'] . "' $selected>" . $cargo_row['nombre'] . "</option>";
                    }
                }
                ?>
            </select>
            <br>
            <label for="descripcion">Descripción del Cargo:</label>
            <input type="text" id="descripcion" value="<?php echo htmlspecialchars($row['descripcion']); ?>" disabled>
            <br>
            <label for="sub_admin_id">Sub Administrador:</label>
            <select name="sub_admin_id" required>
                <option value="">Seleccionar Sub Administrador</option>
                <?php
                if ($sub_admin_result->num_rows > 0) {
                    while($sub_admin_row = $sub_admin_result->fetch_assoc()) {
                        $selected = $sub_admin_row['id'] == $row['sub_admin_id'] ? 'selected' : '';
                        echo "<option value='" . $sub_admin_row['id'] . "' $selected>" . $sub_admin_row['nombre'] . "</option>";
                    }
                }
                ?>
            </select>
            <br>
            <label for="fecha_asignacion">Fecha de Asignación:</label>
            <input type="datetime-local" name="fecha_asignacion" value="<?php echo date('Y-m-d\TH:i', strtotime($row['fecha_asignacion'])); ?>" required>
            <br>
            <input type="submit" value="Actualizar">
        </form>
    <?php endif; ?>
</body>
</html>