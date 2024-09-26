<?php
include 'conexion.php';

// Obtener datos de cargo y sub_administrador
$cargo_sql = "SELECT * FROM cargo";
$cargo_result = $conn->query($cargo_sql);

$sub_admin_sql = "SELECT * FROM sub_administrador";
$sub_admin_result = $conn->query($sub_admin_sql);

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $cargo_id = $_POST['cargo_id'];
    $sub_admin_id = $_POST['sub_admin_id'];
    $fecha_asignacion = $_POST['fecha_asignacion'];

    if (empty($cargo_id) || empty($sub_admin_id) || empty($fecha_asignacion)) {
        $error_message = "Todos los campos son obligatorios.";
    } else {
        $sql = "INSERT INTO car_sub (cargo_id, sub_admin_id, fecha_asignacion) VALUES ('$cargo_id', '$sub_admin_id', '$fecha_asignacion')";

        if ($conn->query($sql) === TRUE) {
            echo "Nueva relación creada exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Relación Cargo-Sub Administrador</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo adicional personalizado */
        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
            padding: 15px;
            background-color: #f8f9fa;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
        }
        .container {
            margin-top: 50px;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        select,
        input[type="datetime-local"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php include 'D:\integrador\cop_modif\sidebar.php'; ?>

    <div class="content">
        <form method="post" action="create_car_sub.php">
            <h2 class="mt-5">Crear Relación Cargo-Sub Administrador</h2>
            <?php if (!empty($error_message)) : ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <div class="form-group">
                <label for="cargo_id">Cargo:</label>
                <select name="cargo_id" id="cargo_id" class="form-control" required>
                    <option value="">Seleccionar Cargo</option>
                    <?php
                    if ($cargo_result->num_rows > 0) {
                        while($row = $cargo_result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sub_admin_id">Sub Administrador:</label>
                <select name="sub_admin_id" id="sub_admin_id" class="form-control" required>
                    <option value="">Seleccionar Sub Administrador</option>
                    <?php
                    if ($sub_admin_result->num_rows > 0) {
                        while($row = $sub_admin_result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_asignacion">Fecha de Asignación:</label>
                <input type="datetime-local" id="fecha_asignacion" name="fecha_asignacion" class="form-control" required>
            </div>
            <button type="submit" name="create" class="btn btn-primary">Crear</button>
        </form>
    </div>

    <!-- Bootstrap JS y jQuery (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
