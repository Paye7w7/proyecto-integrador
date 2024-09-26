<?php
session_start();
include("connect.php");

// Verificar si el usuario está autenticado
if(!isset($_SESSION['gmail'])){
    // Si no está autenticado, redirigir al inicio de sesión
    header("Location: login.php");
    exit(); // Detener la ejecución del script
}

// Obtener el correo electrónico del usuario de la sesión
$gmail = $_SESSION['gmail'];

// Consultar el rol del usuario
$query = mysqli_query($conn, "SELECT rol FROM usuario WHERE gmail='$gmail'");
if($query){
    $row = mysqli_fetch_assoc($query);
    $rol = $row['rol'];
    
    // Redirigir según el rol del usuario
    if($rol == 'administrador'){
        header("Location: aindex.php");
        exit();
    } elseif($rol == 'usuario') {
        header("Location: index.php");
        exit();
    } else {
        // Manejar otros roles según sea necesario
        header("Location: error_page.php");
        exit();
    }
} else {
    // Error al consultar la base de datos
    echo "Error al obtener el rol del usuario.";
}
?>
