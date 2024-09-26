<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tarjetas</title>
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

    .card {
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        margin: 20px;
        width: 300px;
        flex: 1; /* Ocupa el espacio disponible */
    }

    .card-img {
        width: 100%;
        height: auto;
    }

    .card-content {
        padding: 20px;
    }

    .card-content h3 {
        margin-top: 0;
        color: #333;
    }

    .card-content p {
        color: #666;
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

    /* Estilos adicionales para disposición en línea */
    .card-container {
        display: flex;
        justify-content: space-around; /* Espacio uniforme entre tarjetas */
        flex-wrap: wrap; /* Ajuste para que las tarjetas se envuelvan */
    }
</style>
</head>
<body>
<?php include 'D:\integrador\cop_modif\sidebar.php'; ?>
<div style="margin-left: 250px; padding: 20px;">

<div class="card-container">
    <div class="card">
        <!-- Aquí puedes incluir una imagen opcional si lo deseas -->
        <div class="card-content">
            <h3>Generar Reporte PDF</h3>
            <p>Haz clic para generar y descargar el reporte en PDF de las reservas.</p>
            <form action="registros.php" method="post">
                <button type="submit" class="btn" name="generate_pdf">Registros</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-content">
            <h3>Título de la Tarjeta 2</h3>
            <p>Descripción corta de la tarjeta 2.</p>
            <a href="#" class="btn">Botón de Acción</a>
        </div>
    </div>
</div>

</body>
</html>
