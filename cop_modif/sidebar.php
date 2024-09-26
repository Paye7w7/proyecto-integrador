<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #f8f8f8;
            padding: 15px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }
        .sidebar a {
            display: block;
            color: #000;
            text-decoration: none;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #ddd;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menú</h2>
        <a href="/inicio/index.php">Inicio</a>
        <a href="/crud_servicio/index_servicio.php">Servicio</a>
        <a href="/crud_tiposervicio/index_tipo_servicio.php">Tipo de servicio</a>
        <a href="/crudcar_sub/cargo/index.php">Cargo</a>
        <a href="/crudcar_sub/sub_admin/index.php">Crear sub administrador</a>
        <a href="/crudcar_sub/index.php">Dar cargo a sub administrador</a>
        <a href="/crudhabi/index_habitacion.php">Añadir Habitación</a>
        <a href="/crudpiso/index.php">Añadir piso</a>
        <a href="/crudtipohab/index.php">Añadir tipo de habitacion</a>
        <!-- Añadir más enlaces según sea necesario -->
    </div>
</body>
</html>
