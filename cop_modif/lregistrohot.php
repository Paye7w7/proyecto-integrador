<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Hotel</title>
    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="lassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lassets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="lassets/css/form-elements.css">
    <link rel="stylesheet" href="lassets/css/style.css">
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="lassets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="lassets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="lassets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="lassets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="lassets/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
    <div class="top-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1>Registrate gratis con tu hotel y inicia sesión</h1>
                    <div class="description">
                        <p>Este es un apartado en donde puedes registrar a tu hospedaje y se pueda subir a la plataforma, ingrese los datos correctos y se parte de esta familia.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 show-forms">
                    <span class="show-register-form active">Registro de Hotel</span>
                </div>
            </div>
            <div class="row register-form">
                <div class="col-sm-4 col-sm-offset-1">
                    <form role="form" action="lsubmit_hotel.php" method="post" class="r-form">
                        <div class="form-group">
                            <input type="text" name="r-form-email" placeholder="Gmail..." class="r-form-email form-control" id="r-form-email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="r-form-first-name" placeholder="Nombre completo..." class="r-form-first-name form-control" id="r-form-first-name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="r-form-last-name" placeholder="Apellido completo..." class="r-form-last-name form-control" id="r-form-last-name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="r-form-phone" placeholder="Telefono..." class="r-form-phone form-control" id="r-form-phone">
                        </div>
                        <div class="form-group">
                            <input type="text" name="r-form-nombre-hotel" placeholder="Nombre de tu hotel..." class="r-form-nombre-hotel form-control" id="r-form-nombre-hotel">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="r-form-tipo-hotel">Tipo de Hotel</label>
                            <select name="r-form-tipo-hotel" class="r-form-tipo-hotel form-control" id="r-form-tipo-hotel">
                                <option value="">Seleccione el tipo de hotel</option>
                                <?php
                                include 'connect.php'; // Incluir el archivo de conexión a la base de datos

                                $sql_tipos_hotel = "SELECT Nombre FROM categoria_hoteles";
                                $resultado_tipos_hotel = $conn->query($sql_tipos_hotel);

                                if ($resultado_tipos_hotel->num_rows > 0) {
                                    while ($fila_tipo_hotel = $resultado_tipos_hotel->fetch_assoc()) {
                                        echo "<option value='" . $fila_tipo_hotel['Nombre'] . "'>" . $fila_tipo_hotel['Nombre'] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No hay categorías de hotel disponibles</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="password" name="r-form-contraseña" placeholder="Contraseña..." class="r-form-contraseña form-control" id="r-form-contraseña">
                        </div>
                        <button type="submit" class="btn">Registrarse</button>
                    </form>
                </div>
                <div class="col-sm-6 forms-right-icons">
                    <h1>¿Qué puedes hacer con HOTELES.NET?</h1>
                    <div class="row">
                        <div class="col-sm-2 icon"><i class="fa fa-pencil"></i></div>
                        <div class="col-sm-10">
                            <h3>Haces conocer a tu hotel</h3>
                            <p>Haces que muchas personas vean tu hotel y puedan hacer sus reservas y hacer que se haga famoso tu hotel.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 icon"><i class="fa fa-commenting"></i></div>
                        <div class="col-sm-10">
                            <h3>Recibir comentarios de los demás</h3>
                            <p>Con los comentarios mejoras tu hotel y haces que sea más reconocido y valorado en el mercado de hoteles.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 icon"><i class="fa fa-magic"></i></div>
                        <div class="col-sm-10">
                            <h3>Modificar tu hotel</h3>
                            <p>Puedes modificar tu publicidad y tus habitaciones mediante el transcurso de las gestiones.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascript -->
    <script src="lassets/js/jquery-1.11.1.min.js"></script>
    <script src="lassets/bootstrap/js/bootstrap.min.js"></script>
    <script src="lassets/js/jquery.backstretch.min.js"></script>
    <script src="lassets/js/scripts.js"></script>
    <script>
        $(document).ready(function() {
            $('#r-form-email').on('change', function() {
                var gmail = $(this).val();
                if (gmail) {
                    $.ajax({
                        url: 'lget_user_info.php',
                        type: 'POST',
                        data: {
                            gmail: gmail
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            if (data.error) {
                                alert(data.error);
                            } else {
                                $('#r-form-first-name').val(data.nombre_completo);
                                $('#r-form-last-name').val(data.apellido_completo);
                                $('#r-form-phone').val(data.telefono); // Llenar el campo de teléfono
                                $('#r-form-contraseña').val(data.contraseña); // Llenar el campo de contraseña
                            }
                        },
                        error: function() {
                            alert('Error al obtener los datos del usuario');
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>
