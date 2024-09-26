<?php
include 'conexion.php';

if(isset($_GET['id_piso'])) {
    $id_piso = $_GET['id_piso'];
    
    // Consulta para obtener las habitaciones del piso especificado
    $sql = "SELECT * FROM habitacion WHERE Id_hab IN (SELECT Id_hab FROM piso_habitacion WHERE id_piso=$id_piso)";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitaciones del Piso</title>
</head>
<body>
<?php include 'D:\integrador\cop_modif\sidebar.php'; ?>
<div style="margin-left: 250px; padding: 20px;">
    <h1>Habitaciones del Piso</h1>
    <?php if(isset($result) && $result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID Habitación</th>
                <th>Precio por Noche</th>
                <th>Disponible</th>
                <!-- Otros campos de la tabla habitaciones -->
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Id_hab']; ?></td>
                    <td><?php echo $row['Precio_noche_hab']; ?></td>
                    <td><?php echo $row['Disponible'] ? 'Sí' : 'No'; ?></td>
                    <!-- Mostrar otros campos de la tabla habitaciones según sea necesario -->
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No se encontraron habitaciones para este piso.</p>
    <?php endif; ?>
    <a href="index.php">Volver</a>
</body>
</html>
