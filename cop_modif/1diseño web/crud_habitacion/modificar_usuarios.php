<?php
include "modelo/conexion.php";
$id = $_GET["id"];

$sql = $conexion->query(" select * from habitacion where Id_hab=$id ")

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center text-secondary">Modificar habitaciones</h3>
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
        <?php
        include "controlador/modificar_usuario.php";
        while ($datos = $sql->fetch_object()) { ?>
             
            <!--crud nombre-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio por noche (Bs)</label>
                <input type="text" class="form-control" name=Precio_noche_hab value="<?= $datos->Precio_noche_hab ?>">
            </div>
            <!--crud apellido-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Disponible</label>
                <input type="text" class="form-control" name="Disponible" value="<?= $datos->Disponible ?>">
            </div>
            <!--crud gmail-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Foto de la Habitación</label>
                <input type="img" class="form-control" name="foto_hab" value="<?= $datos->foto_hab ?>">
            </div>
            <!--crud contrasena-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipo de habitación</label>
                <input type="text" class="form-control" name="tipo_hab" value="<?= $datos->tipo_hab ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Capacidad de habitación (Persona)</label>
                <input type="text" class="form-control" name="capacidad_hab" value="<?= $datos->capacidad_hab ?>">
            </div>
        <?php }

        ?>


        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar Habitación</button>
    </form>
</body>

</html>