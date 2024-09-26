<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Habitación</title>
</head>
<body>
    <h1>Agregar Nueva Habitación</h1>
    <form action="insert_habitacion.php" method="POST" enctype="multipart/form-data">
        <label for="Precio_noche_hab">Precio por Noche:</label>
        <input type="number" id="Precio_noche_hab" name="Precio_noche_hab" required>
        <br>
        <label for="Disponible">Disponible:</label>
        <input type="checkbox" id="Disponible" name="Disponible">
        <br>
        <label for="foto_hab">Foto:</label>
        <input type="file" id="foto_hab" name="foto_hab">
        <br>
        <label for="tipo_hab">Tipo de Habitación:</label>
        <select id="tipo_hab" name="tipo_hab">
            <!-- Aquí deberías agregar las opciones de tipo de habitación -->
        </select>
        <br>
        <label for="capacidad_hab">Capacidad:</label>
        <input type="number" id="capacidad_hab" name="capacidad_hab" required>
        <br>
        <label for="id_piso">Piso:</label>
        <select id="id_piso" name="id_piso">
            <!-- Aquí deberías agregar las opciones de pisos -->
        </select>
        <br>
        <input type="submit" value="Agregar Habitación">
    </form>
    <a href="index.php">Volver a la lista de habitaciones</a>
</body>
</html>
