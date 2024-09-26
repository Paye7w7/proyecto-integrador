<?php
include 'conexion.php';
session_start(); // Iniciar la sesión

// Consulta SQL para obtener los tipos de servicio desde la base de datos
$sql_tipos_servicio = "SELECT * FROM tipo_servicio";
$resultado_tipos_servicio = $conn->query($sql_tipos_servicio);

// Array asociativo para almacenar los tipos de servicio con sus descripciones
$tipos_servicio = [];

if ($resultado_tipos_servicio->num_rows > 0) {
    // Recorre cada fila de resultados y agrega los tipos de servicio al array
    while ($row = $resultado_tipos_servicio->fetch_assoc()) {
        $tipos_servicio[$row['Nombre_tipo']] = $row['Descripcion'];
    }
}

// Manejar la creación del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $foto = $_POST['foto'];
    $tipo = $_POST['tipo'];

    // Consulta SQL para insertar el nuevo servicio en la base de datos
    $sql_insert = "INSERT INTO servicio (Nombre_ser, Descripcion_ser, Precio_ser, foto_ser, tipo_ser) VALUES ('$nombre', '$descripcion', '$precio', '$foto', '$tipo')";

    if ($conn->query($sql_insert) === TRUE) {
        $_SESSION['success'] = "Servicio añadido correctamente.";
        header("Location: index_servicio.php");
        exit();
    } else {
        $_SESSION['error'] = "Error al añadir el servicio: " . $conn->error;
        header("Location: index_servicio.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Servicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
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
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tipo').change(function() {
                var tipoSeleccionado = $(this).val();
                // Obtener la descripción correspondiente al tipo seleccionado
                var descripcion = <?php echo json_encode($tipos_servicio); ?>;
                $('#descripcion').val(descripcion[tipoSeleccionado]);
            });
        });
    </script>
</head>
<body>
    <?php include 'D:\integrador\cop_modif\sidebar.php'; ?>

    <div class="content">
        <div class="container mt-5">
            <h1 class="mb-4">Añadir Servicio</h1>
            <form method="post">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select id="tipo" name="tipo" class="form-control" required>
                        <?php foreach ($tipos_servicio as $tipo => $descripcion): ?>
                            <option value="<?php echo $tipo; ?>"><?php echo $tipo; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="precio">Precio (Bs):</label>
                    <input type="number" id="precio" name="precio" step="0.01" class="form-control" required>
                </div>
            <!--    <div class="form-group">
                    <label for="foto">Foto:</label>
                    <input type="text" id="foto" name="foto" class="form-control" required>
                </div> -->
                <button type="submit" class="btn btn-primary">Añadir Servicio</button>
            </form>
            <a href="index_servicio.php" class="btn btn-secondary mt-3">Volver</a>
        </div>
    </div>
</body>
</html>
