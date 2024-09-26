<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y obtener los datos del formulario
    $id_tipo_servicio = $_POST['id_tipo_servicio'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Consulta SQL para actualizar el tipo de servicio en la base de datos
    $sql = "UPDATE tipo_servicio SET Nombre_tipo='$nombre', Descripcion='$descripcion' WHERE Id_tipo_ser=$id_tipo_servicio";

    if ($conn->query($sql) === TRUE) {
        echo "Tipo de servicio actualizado correctamente.";
        // Redireccionar al index
        header("Location: index_tipo_servicio.php");
        exit();
    } else {
        echo "Error al actualizar el tipo de servicio: " . $conn->error;
    }
}

// Obtener el ID del tipo de servicio a editar
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_tipo_servicio = $_GET['id'];
    
    // Consulta SQL para obtener los datos del tipo de servicio
    $sql = "SELECT * FROM tipo_servicio WHERE Id_tipo_ser=$id_tipo_servicio";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró el tipo de servicio a editar.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo de Servicio</title>
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
    </style>
</head>
<body>
    <?php include 'D:\integrador\cop_modif\sidebar.php'; ?>

    <div class="content">
        <div class="container mt-5">
            <h1>Editar Tipo de Servicio</h1>
            <form method="post">
                <input type="hidden" name="id_tipo_servicio" value="<?php echo $row['Id_tipo_ser']; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $row['Nombre_tipo']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" class="form-control"><?php echo $row['Descripcion']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS y jQuery (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
