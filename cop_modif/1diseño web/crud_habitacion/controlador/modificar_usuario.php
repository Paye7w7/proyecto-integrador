<?php 

if(!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["Precio_noche_hab"]) && !empty($_POST["Disponible"]) && !empty($_POST["foto_hab"]) && !empty($_POST["tipo_hab"]) && !empty($_POST["capacidad_hab"]) ) {
        $id = $_POST["id"];
        $Precio_noche_hab = $_POST["Precio_noche_hab"];
        $Disponible = $_POST["Disponible"];
        $foto_hab = $_POST["foto_hab"];
        $tipo_hab = $_POST["tipo_hab"];
        $capacidad_hab = $_POST["capacidad_hab"];
        $sql = $conexion->query("UPDATE habitacion SET Precio_noche_hab=$Precio_noche_hab, Disponible='$Disponible', foto_hab='$foto_hab', tipo_hab='$tipo_hab', capacidad_hab=$capacidad_hab WHERE Id_hab=$id");
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

