<?php
include 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_categoria = $_GET['id'];
    
    $sql = "SELECT * FROM categoria_hoteles WHERE Id_cat=$id_categoria";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        $_SESSION['error'] = "No se encontró la categoría a editar.";
        header("Location: index_categoria.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_categoria = $_POST['id_categoria'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $rango = $_POST['rango'];

    $sql_update = "UPDATE categoria_hoteles SET Nombre='$nombre', Descripcion='$descripcion', rango='$rango' WHERE Id_cat=$id_categoria";

    if ($conn->query($sql_update) === TRUE) {
        $_SESSION['success'] = "Categoría actualizada correctamente.";
        header("Location: index_categoria.php");
        exit();
    } else {
        $_SESSION['error'] = "Error al actualizar la categoría: " . $conn->error;
        header("Location: index_categoria.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría de Hotel</title>
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
    </style>
</head>
<body>
    <?php include 'D:\integrador\cop_modif\sidebar.php'; ?>

    <div class="content">
        <div class="container mt-5">
            <div class="border p-4">
                <h1 class="text-center mb-4">Editar Categoría de Hotel</h1>

                <?php if (isset($row)): ?>
                <form method="post">
                    <input type="hidden" name="id_categoria" value="<?php echo $row['Id_cat']; ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $row['Nombre']; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" required><?php echo $row['Descripcion']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rango">Rango:</label>
                        <input type="number" id="rango" name="rango" value="<?php echo $row['rango']; ?>" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
                <?php else: ?>
                <p class="text-danger">No se encontró la categoría a editar.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
