<?php
if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query(" delete from habitacion where Id_hab=$id");
    if ($sql==1) {
        echo"<div class='alert alert-success'> Usuario Eliminado </div>"; 
    } else {
        echo"<div class='alert alert-danger'> Error al momento de eliminar </div>"; 
    }
}
?>