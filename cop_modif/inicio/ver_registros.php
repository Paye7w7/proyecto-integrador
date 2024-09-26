<?php
// Configurar la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Si no tienes contraseña, déjalo vacío
$dbname = "hoteles";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de las reservas
$sql = "SELECT * FROM reserva";
$result = $conn->query($sql);

// Verificar si hay resultados y mostrar los registros
if ($result->num_rows > 0) {
    echo '<h2>Registros de Reserva</h2>';
    echo '<table border="1" cellspacing="0" cellpadding="5">';
    echo '<tr><th>ID</th><th>Fecha Inicio</th><th>Fecha Fin</th><th>ID Huesped</th><th>ID Habitación</th><th>Estado</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['Id_res'] . '</td>';
        echo '<td>' . $row['Fecha_inicio'] . '</td>';
        echo '<td>' . $row['Fecha_fin'] . '</td>';
        echo '<td>' . $row['Id_hue'] . '</td>';
        echo '<td>' . $row['Id_habitacion'] . '</td>';
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
