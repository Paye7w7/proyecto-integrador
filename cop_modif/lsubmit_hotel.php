<?php

// Conexión a la base de datos y otros archivos necesarios
include 'connect.php';

if(isset($_POST['r-form-email'])){
    $gmail = $_POST['r-form-email'];
    // Consulta para encontrar al usuario por su correo electrónico
    $query = "SELECT * FROM usuario WHERE gmail='$gmail'";
    $result = $conn->query($query);
    if($result->num_rows > 0) {
        // Si el usuario existe, actualizar su rol a administrador
        $updateQuery = "UPDATE usuario SET rol='administrador' WHERE gmail='$gmail'";
        if($conn->query($updateQuery) === TRUE) {
            // El rol se actualizó con éxito, ahora puedes insertar los datos del hotel
            // Insertar los datos del hotel en la tabla correspondiente
            // ...
            // Redirigir a alguna página de éxito o mostrar un mensaje de éxito
            header("Location: sidebar.php");
            exit();
        } else {
            // Error al actualizar el rol del usuario
            echo "Error al actualizar el rol del usuario: " . $conn->error;
        }
    } else {
        // El usuario no fue encontrado en la base de datos
        echo "Usuario no encontrado.";
    }
}

?>
