<?php
include 'conexion.php';
session_start();

if (isset($_GET['id'])) {
    $id_categoria = $_GET['id'];

    $sql_delete = "DELETE FROM categoria_hoteles WHERE Id_cat=$id_categoria";

    if ($conn->query($sql_delete) === TRUE) {
        $_SESSION['success'] = "Categoría eliminada correctamente.";
    } else {
        $_SESSION['error'] = "Error al eliminar la categoría: " . $conn->error;
    }
}

header("Location: index_categoria.php");
exit();
?>
