<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registros de Reserva</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: flex-start; /* Alineación ajustada al principio */
        height: 100vh;
        margin: 0;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        margin-top: 10px;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
<?php include 'D:\integrador\cop_modif\sidebar.php'; ?>
<div style="margin-left: 250px; padding: 20px;">
    <h1>Registros de Reserva</h1>

    <?php
    include 'conexion.php';

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para obtener los datos de las reservas
    $sql = "SELECT r.Id_res, r.Fecha_inicio, r.Fecha_fin, h.Precio_noche_hab, r.Estado
            FROM reserva r
            INNER JOIN habitacion h ON r.Id_habitacion = h.Id_hab";
    $result = $conn->query($sql);

    // Botón para descargar el PDF
    echo '<form action="generar_reporte.php" method="post">';
    echo '<button type="submit" class="btn" name="generate_pdf">Descargar PDF</button>';
    echo '</form>';

    // Verificar si hay resultados y mostrar los registros en una tabla
    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Fecha Inicio</th><th>Fecha Fin</th><th>Precio por Noche</th><th>Estado</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['Id_res'] . '</td>';
            echo '<td>' . $row['Fecha_inicio'] . '</td>';
            echo '<td>' . $row['Fecha_fin'] . '</td>';
            echo '<td>' . $row['Precio_noche_hab'] . '</td>';
            echo '<td>' . $row['Estado'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "No hay registros disponibles";
    }

    // Cerrar conexión
    $conn->close();
    ?>

</div>
</body>
</html>
