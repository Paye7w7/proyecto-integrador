<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Tipo de Habitación</title>
</head>
<body>
<?php include 'D:\integrador\cop_modif\sidebar.php'; ?>
<div style="margin-left: 250px; padding: 20px;">
    <h1>Agregar Tipo de Habitación</h1>
    <form action="insert_tipo_habitacion.php" method="POST">
        <label for="nombre_tipo">Nombre del Tipo:</label>
        <input type="text" id="nombre_tipo" name="nombre_tipo" required>
        <br>
        <label for="descripcion_tipo">Descripción:</label>
        <textarea id="descripcion_tipo" name="descripcion_tipo"></textarea>
        <br>
        <label for="servicio">Servicio:</label>
        <input type="text" id="servicio" name="servicio">
        <br>
        <label for="estado">Estado:</label>
        <select id="estado" name="estado">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>
        <br>
        <input type="submit" value="Agregar Tipo de Habitación">
    </form>
    <a href="index.php">Volver</a>
</body>
</html>
