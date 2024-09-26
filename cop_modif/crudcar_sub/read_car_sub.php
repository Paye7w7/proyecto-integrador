<?php
include 'conexion.php';

// Obtener datos de la tabla car_sub junto con los nombres de cargo y sub_administrador
$sql = "SELECT car_sub.id, cargo.nombre AS cargo_nombre, sub_administrador.nombre AS sub_admin_nombre, car_sub.fecha_asignacion
        FROM car_sub
        JOIN cargo ON car_sub.cargo_id = cargo.id
        JOIN sub_administrador ON car_sub.sub_admin_id = sub_administrador.id
        WHERE car_sub.deleted_at IS NULL";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Cargo</th><th>Sub Administrador</th><th>Fecha de Asignación</th><th>Acciones</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['cargo_nombre']}</td>
                <td>{$row['sub_admin_nombre']}</td>
                <td>{$row['fecha_asignacion']}</td>
                <td>
                    <a href='update_car_sub.php?id={$row['id']}'>Editar</a> | 
                    <a href='delete_car_sub.php?id={$row['id']}'>Eliminar</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
?>
