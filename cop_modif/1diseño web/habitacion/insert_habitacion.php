<?php
include '../conexion.php';

// Verifica que los campos existan en el arreglo $_POST
$precio_noche = isset($_POST['Precio_noche_hab']) ? $_POST['Precio_noche_hab'] : 0;
$disponible = isset($_POST['Disponible']) ? 1 : 0;
$foto = isset($_FILES['foto_hab']['name']) ? $_FILES['foto_hab']['name'] : '';
$tipo_hab = isset($_POST['tipo_hab']) ? $_POST['tipo_hab'] : '';
$capacidad = isset($_POST['capacidad_hab']) ? $_POST['capacidad_hab'] : 0;
$id_piso = isset($_POST['id_piso']) ? $_POST['id_piso'] : 0;

// Crear la carpeta 'uploads' si no existe
$uploads_dir = 'uploads';
if (!is_dir($uploads_dir)) {
    mkdir($uploads_dir, 0777, true);
}

// Mover la imagen subida a la carpeta deseada
$upload_file = $uploads_dir . '/' . basename($foto);
if (!empty($foto)) {
    if (move_uploaded_file($_FILES['foto_hab']['tmp_name'], $upload_file)) {
        echo "El archivo ha sido subido exitosamente.";
    } else {
        echo "Error al subir el archivo.";
    }
}

// Insertar la nueva habitación
$sql = "INSERT INTO habitacion (Precio_noche_hab, Disponible, foto_hab, tipo_hab, capacidad_hab, id_piso)
        VALUES ('$precio_noche', '$disponible', '$foto', '$tipo_hab', '$capacidad', '$id_piso')";

if ($conn->query($sql) === TRUE) {
    echo "Nueva habitación agregada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<a href="index.php">Volver a la lista de habitaciones</a>
