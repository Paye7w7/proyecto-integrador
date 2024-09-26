<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cruds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/38431afa4f.js" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        function eliminar(){
            var respuesta=confirm("¿Estas seguro de eliminar este usuario?");
            return respuesta
        }
    </script>
    <h1 class="text-center p-5">Registro hotel</h1>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_usuarios.php";
    ?>
  <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Registro de habitacion</h3>
            <?php
            
            include "controlador/registro_persona.php";
            ?>
            
            <!--crud nombre-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio por noche (Bs)</label>
                <input type="text" class="form-control" name=Precio_noche_hab>
            </div>
            <!--crud apellido-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Disponible</label>
                <input type="text" class="form-control" name="Disponible" >
            </div>
            <!--crud gmail-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Foto de la Habitación</label>
                <input type="file" class="form-control" name="foto_hab" >
            </div>
            <!--crud contrasena-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipo de habitación</label>
                <input type="text" class="form-control" name="tipo_hab" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Capacidad de habitación (Persona)</label>
                <input type="text" class="form-control" name="capacidad_hab" >
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
        </form>
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Precio de la habitacion(Bs)</th>
                        <th scope="col">Disponible</th>
                        <th scope="col">Foto de la Habitación<</th>
                        <th scope="col">Tipo de habitación</th>
                        <th scope="col">Capacidad de habitación (Persona)</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query("select * from habitacion");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?=$datos-> Id_hab ?></td>
                            <td><?=$datos-> Precio_noche_hab ?></td>
                            <td><?=$datos-> Disponible ?></td>
                            <td><?=$datos-> foto_hab ?></td>
                            <td><?=$datos-> tipo_hab ?></td>
                            <td><?=$datos-> capacidad_hab ?></td>
                            <td>
                                <a href="modificar_usuarios.php?id=<?= $datos->Id_hab ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="index.php?id=<?= $datos->Id_hab ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                    ?>



                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>