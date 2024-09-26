<?php 
if (!empty($_POST["btnregistrar"])){
    //aqui se pone para validar
    if (!empty($_POST["nombre_completo"]) and !empty($_POST["apellido_completo"]) and !empty($_POST["gmail"]) and !empty($_POST["contraseña"])) {
       
        $nombre_completo=$_POST["nombre_completo"];
        $apellido_completo=$_POST["apellido_completo"];
        $gmail=$_POST["gmail"];
        $contraseña=$_POST["contraseña"];
        $contraseña=md5($contraseña);

        $sql=$conexion->query("insert into usuario(nombre_completo,apellido_completo,gmail,contraseña) values('$nombre_completo','$apellido_completo','$gmail','$contraseña')");
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