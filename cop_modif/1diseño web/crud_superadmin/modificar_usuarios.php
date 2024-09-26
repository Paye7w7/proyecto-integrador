<?php
include "modelo/conexion.php";
$id = $_GET["id"];

$sql = $conexion->query(" select * from usuario where Id=$id ")

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
        <h3 class="text-center text-secondary">Modiicar de personas</h3>
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
        <?php
        include "controlador/modificar_usuario.php";
        while ($datos = $sql->fetch_object()) { ?>
            <!--crud nombre-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" name="nombre_completo" value="<?= $datos->nombre_completo ?>">
            </div>
            <!--crud apellido-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido completo</label>
                <input type="text" class="form-control" name="apellido_completo" value="<?= $datos->apellido_completo ?>">
            </div>
            <!--crud gmail-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Gmail</label>
                <input type="text" class="form-control" name="gmail" value="<?= $datos->gmail ?>">
            </div>
            <!--crud contrasena-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contraseña" value="<?= $datos->contraseña ?>">
            </div>
        <?php }

        ?>


        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar Usuario</button>
    </form>
</body>

</html>