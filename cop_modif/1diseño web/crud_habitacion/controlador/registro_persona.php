<?php 
if (!empty($_POST["btnregistrar"])){
    //aqui se pone para validar
    if (!empty($_POST["Precio_noche_hab"]) and !empty($_POST["Disponible"]) and !empty($_POST["foto_hab"]) and !empty($_POST["tipo_hab"]) and !empty($_POST["capacidad_hab"])) {
       
        $Precio_noche_hab=$_POST["Precio_noche_hab"];
        $Disponible=$_POST["Disponible"];
        $foto_hab=$_POST["foto_hab"];
        $tipo_hab=$_POST["tipo_hab"];
        $capacidad_hab=$_POST["capacidad_hab"];

        $sql=$conexion->query("insert into habitacion (Precio_noche_hab,Disponible,foto_hab,tipo_hab,capacidad_hab) values($Precio_noche_hab,'$Disponible','$foto_hab','$tipo_hab',$capacidad_hab)");
        if ($sql==1){
            echo '<div class="alert alert-success">Persona registrada correctamente</div>';
        }else{
            echo '<div class="alert alert-danger">Error al registrar</div>';
        }
    }else{
        echo '<div class="alert alert-warning">Algunos de los campos esta vacio</div>';
    }
}


?>