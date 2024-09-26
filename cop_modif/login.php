<?php
include 'connect.php'; // Ajusta la ruta según la ubicación de tu archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gmail = $_POST['gmail'];
    $contraseña = $_POST['contraseña'];

    // Validar que el correo electrónico tenga el dominio @gmail.com
    if (strpos($gmail, '@gmail.com') === false) {
        echo "Error: El correo electrónico debe ser una dirección de @gmail.com.";
    } else {
        // Consulta para verificar el usuario
        $sql = "SELECT * FROM usuario WHERE gmail='$gmail' AND contraseña='$contraseña'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Obtener información del usuario
            $row = $result->fetch_assoc();
            $rol = $row['rol'];

            // Iniciar sesión
            echo "Inicio de sesión exitoso";

            // Redirigir según el rol del usuario
            if ($rol == 'administrador') {
                header("Location: sidebar.php");
            } else {
                header("Location: uvistausuario.php");
            }
            exit(); // Asegura que el script no continúe después de la redirección
        } else {
            echo "Gmail o contraseña incorrectos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('fondo.jpeg') no-repeat center center fixed; 
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
        <h1>Iniciar Sesión</h1>
        <form method="post" action="login.php">
            <label for="gmail">Gmail:</label>
            <input type="email" id="gmail" name="gmail" required>
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <a href="register.php" class="back-link">Crear una cuenta</a>
    </div>
</body>
</html>
