<?php
include 'conexion.php';

$sql = "SELECT * FROM sub_administrador";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Fecha Creación</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nombre"]. "</td><td>" . $row["email"]. "</td><td>" . $row["telefono"]. "</td><td>" . $row["fecha_creacion"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
?>
