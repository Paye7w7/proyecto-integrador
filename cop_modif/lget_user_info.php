<?php
include 'connect.php';

if (isset($_POST['gmail'])) {
    $gmail = $_POST['gmail'];
    $query = "SELECT * FROM usuario WHERE gmail='$gmail'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $response = [
            'nombre_completo' => $user['nombre_completo'],
            'apellido_completo' => $user['apellido_completo']
        ];
        echo json_encode($response);
    } else {
        echo json_encode(['error' => 'Usuario no encontrado.']);
    }
}
?>
