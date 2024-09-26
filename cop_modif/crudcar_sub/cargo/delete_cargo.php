<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM cargo WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Cargo eliminado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form method="post" action="delete_cargo.php">
    ID del Cargo: <input type="text" name="id" required>
    <input type="submit" value="Eliminar">
</form>
