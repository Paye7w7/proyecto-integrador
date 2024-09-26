<?php
include 'connect.php'; // Ajusta la ruta según la ubicación de tu archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gmail = $_POST['gmail'];
    $nombre_completo = $_POST['nombre_completo'];
    $apellido_completo = $_POST['apellido_completo'];
    $telefono = $_POST['telefono'];
    $contraseña = $_POST['contraseña'];

    // Validar que el correo electrónico tenga el dominio @gmail.com
    if (strpos($gmail, '@gmail.com') === false) {
        echo "Error: El correo electrónico debe ser una dirección de @gmail.com.";
    } else {
        // Verificar si el gmail ya existe en la base de datos
        $sql_check = "SELECT * FROM usuario WHERE gmail='$gmail'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            echo "Error: El gmail ya está registrado.";
        } else {
            $sql = "INSERT INTO usuario (gmail, nombre_completo, apellido_completo, telefono, contraseña) 
                    VALUES ('$gmail', '$nombre_completo', '$apellido_completo', '$telefono', '$contraseña')";

            if ($conn->query($sql) === TRUE) {
                echo "Nuevo usuario creado exitosamente";
                // Redirigir a la página de inicio de sesión
                header("Location: login.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('fodno.png') no-repeat center center fixed; 
            background-size: cover;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            margin-top: 20px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
        }
        form input {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            width: auto;
            padding: 10px 20px;
        }
        form input[type="submit"]:hover {
            background-color: #45a049;
        }
        .back-link {
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crear Nuevo Usuario</h1>
        <form method="post" action="register.php">
            <label for="nombre_completo">Nombre Completo:</label>
            <input type="text" id="nombre_completo" name="nombre_completo" required>
            <label for="apellido_completo">Apellido Completo:</label>
            <input type="text" id="apellido_completo" name="apellido_completo" required>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
            <label for="gmail">Gmail:</label>
            <input type="email" id="gmail" name="gmail" required>
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>
            <input type="submit" value="Crear">
        </form>
        <a href="login.php" class="back-link">Iniciar Sesión</a>
    </div>
</body>
</html>
