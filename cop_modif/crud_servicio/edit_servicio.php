<?php
session_start(); // Iniciar la sesión

// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

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

// Obtener el ID del servicio a editar y los datos del servicio
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_servicio = $_GET['id'];
    
    // Consulta SQL para obtener los datos del servicio
    $sql = "SELECT * FROM servicio WHERE Id_ser=$id_servicio";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        $_SESSION['error'] = "No se encontró el servicio a editar.";
        header("Location: index_servicio.php");
        exit();
    }
}

// Manejar la actualización del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_servicio = $_POST['id_servicio'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $foto = $_POST['foto'];
    $tipo = $_POST['tipo'];

    // Consulta SQL para actualizar el servicio en la base de datos
    $sql_update = "UPDATE servicio SET 
                    Nombre_ser='$nombre', 
                    Descripcion_ser='$descripcion', 
                    Precio_ser='$precio', 
                    foto_ser='$foto', 
                    tipo_ser='$tipo' 
                  WHERE Id_ser=$id_servicio";

    if ($conn->query($sql_update) === TRUE) {
        $_SESSION['success'] = "Servicio actualizado correctamente.";
        header("Location: index_servicio.php");
        exit();
    } else {
        $_SESSION['error'] = "Error al actualizar el servicio: " . $conn->error;
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
    <title>Editar Servicio</title>
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
        <div class="container">
            <h1 class="mb-4">Editar Servicio</h1>
            <?php if (isset($row)): ?>
            <form method="post">
                <input type="hidden" name="id_servicio" value="<?php echo $row['Id_ser']; ?>">
                
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $row['Nombre_ser']; ?>" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select id="tipo" name="tipo" class="form-control" required>
                        <?php foreach ($tipos_servicio as $tipo => $descripcion): ?>
                            <option value="<?php echo $tipo; ?>" <?php if ($tipo == $row['tipo_ser']) echo "selected"; ?>>
                                <?php echo $tipo; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" required><?php echo $row['Descripcion_ser']; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="precio">Precio (Bs):</label>
                    <input type="number" id="precio" name="precio" step="0.01" value="<?php echo $row['Precio_ser']; ?>" class="form-control" required>
                </div>
                
           <!--     <div class="form-group">
                    <label for="foto">Foto:</label>
                    <input type="text" id="foto" name="foto" value="<?php echo $row['foto_ser']; ?>" class="form-control" required>
                </div> -->
                
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
            <?php else: ?>
            <p>No se encontró el servicio a editar.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
