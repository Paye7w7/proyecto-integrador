<?php
include 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $rango = $_POST['rango'];

    $sql_insert = "INSERT INTO categoria_hoteles (Nombre, Descripcion, rango) VALUES ('$nombre', '$descripcion', '$rango')";

    if ($conn->query($sql_insert) === TRUE) {
        $_SESSION['success'] = "Categoría añadida correctamente.";
        header("Location: index_categoria.php");
        exit();
    } else {
        $_SESSION['error'] = "Error al añadir la categoría: " . $conn->error;
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
    <title>Añadir Categoría de Hotel</title>
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
        .container-form {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <?php include 'D:\integrador\cop_modif\sidebar.php'; ?>

    <div class="content">
        <div class="container">
            <div class="container-form">
                <h1 class="mb-4">Añadir Categoría de Hotel</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rango">Rango:</label>
                        <input type="number" id="rango" name="rango" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Añadir Categoría</button>
                </form>
                <a href="index_categoria.php" class="mt-3">Volver</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
