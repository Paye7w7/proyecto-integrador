<?php 

if(!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre_completo"]) && !empty($_POST["apellido_completo"]) && !empty($_POST["gmail"]) && !empty($_POST["contraseña"]) ) {
        $id = $_POST["id"];
        $nombre_completo = $_POST["nombre_completo"];
        $apellido_completo = $_POST["apellido_completo"];
        $gmail = $_POST["gmail"];
        $contraseña = $_POST["contraseña"];
        $sql = $conexion->query("UPDATE usuario SET nombre_completo='$nombre_completo', apellido_completo='$apellido_completo', gmail='$gmail', contraseña='$contraseña' WHERE Id=$id");
        if ($sql == 1) {
             
            header("Location: index.php");
            echo "<div class='alert alert-danger'>Modificacion exitosa</div>";
            exit(); // Asegúrate de salir después de redirigir
        } else {
            echo "<div class='alert alert-danger'>Error al modificar</div>"; 
        }
    
    } else {
        echo "<div class='alert alert-warning'>Por favor, completa todos los campos</div>"; 
    }
}
?>

