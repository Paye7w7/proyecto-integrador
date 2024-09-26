<?php
// Incluir la librería DomPDF
require_once 'D:\integrador\cop_modif\vendor\autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Establecer conexión a la base de datos (ejemplo básico)
$servername = "127.0.0.1:3310";
$username = "root";
$password = ""; // Dejar la contraseña en blanco
$dbname = "hoteles";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de las reservas
$sql = "SELECT r.Id_res, r.Fecha_inicio, r.Fecha_fin, h.Precio_noche_hab, r.Estado
        FROM reserva r
        INNER JOIN habitacion h ON r.Id_habitacion = h.Id_hab";
$result = $conn->query($sql);

// Crear una instancia de Dompdf con opciones
$options = new Options();
$options->set('isHtml5ParserEnabled', true); // Habilitar el analizador HTML5
$options->set('isPhpEnabled', true); // Habilitar el procesamiento de PHP en el HTML

$dompdf = new Dompdf($options);

// Contenido HTML para el PDF
$html = '<html>';
$html .= '<head><meta charset="UTF-8">';
$html .= '<style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: flex-start;
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
          </style>';
$html .= '</head>';
$html .= '<body>';
$html .= '<h1>Registros de Reserva</h1>';

// Botón para volver a la página de vista HTML
$html .= '<a href="D:\integrador\cop_modif\inicio\index.php" class="btn">Volver a la vista HTML</a>';

// Verificar si hay resultados y mostrar los registros en una tabla
if ($result->num_rows > 0) {
    $html .= '<table>';
    $html .= '<tr><th>ID</th><th>Fecha Inicio</th><th>Fecha Fin</th><th>Precio por Noche</th><th>Estado</th></tr>';

    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $row['Id_res'] . '</td>';
        $html .= '<td>' . $row['Fecha_inicio'] . '</td>';
        $html .= '<td>' . $row['Fecha_fin'] . '</td>';
        $html .= '<td>' . $row['Precio_noche_hab'] . '</td>';
        $html .= '<td>' . $row['Estado'] . '</td>';
        $html .= '</tr>';
    }

    $html .= '</table>';
} else {
    $html .= '<p>No hay registros disponibles</p>';
}

$html .= '</body></html>';

// Cargar HTML en Dompdf
$dompdf->loadHtml($html);

// Renderizar documento (opcionalmente puedes elegir guardar el archivo en el servidor mediante $dompdf->stream() o $dompdf->output())
$dompdf->render();

// Descargar el PDF generado
$dompdf->stream("reporte_reservas.pdf", array("Attachment" => true));

$conn->close();
?>
