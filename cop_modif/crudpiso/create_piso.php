<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Piso de Habitaciones</title>
</head>
<body>
    <?php include 'D:\integrador\cop_modif\sidebar.php'; ?>

    <div style="margin-left: 250px; padding: 20px;">
        <h1>Agregar Piso de Habitaciones</h1>
        <form action="insert_piso.php" method="POST">
            <label for="numero_piso">Número de Piso:</label>
            <input type="number" id="numero_piso" name="numero_piso" required>
            <br>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"></textarea>
            <br>
            <label for="numero_habitaciones">Número de Habitaciones:</label>
            <input type="number" id="numero_habitaciones" name="numero_habitaciones" required>
            <br>
            <label for="capacidad_total">Capacidad Total:</label>
            <input type="number" id="capacidad_total" name="capacidad_total" required>
            <br>
            <label for="estado">Estado:</label>
            <select id="estado" name="estado">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
            <br>
            <input type="submit" value="Agregar Piso">
        </form>
        <a href="index.php">Volver</a>
    </div>
</body>
</html>
