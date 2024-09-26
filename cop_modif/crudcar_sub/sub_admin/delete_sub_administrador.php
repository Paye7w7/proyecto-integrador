<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM sub_administrador WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Sub administrador eliminado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form method="post" action="delete_sub_administrador.php">
    ID del Sub Administrador: <input type="text" name="id" required>
    <input type="submit" value="Eliminar">
</form>
