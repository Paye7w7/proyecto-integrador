<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="ustyle.css">
</head>
<body>

  
      <header class="page-header" style="padding-bottom: 24px">
    <div class="container" id="signup" style="display:none;">
      <h1 class="form-title">Registro</h1>
      <form method="post" action="uregister.php">
        <div class="input-group">
           <i class="fas fa-user"></i>
           <input type="text" name="nombre_completo" id="nombre_completo" placeholder="nombre_completo" required>
           <label for="nombre_completo">Nombre Completo</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="apellido_completo" id="apellido_completo" placeholder="apellido_completo" required>
            <label for="apellido_completo">Apellido Completo</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="gmail" name="gmail" id="gmail" placeholder="Gmail" required>
            <label for="gmail">Gmail</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required>
            <label for="contraseña">Contraseña</label>
        </div>
       <input type="submit" class="btn" value="Registrarme" name="signUp">
      </form>
      <div id="tooltip"></div> 
      <script>
        // Función para mostrar el mensaje de error en el globo flotante
        function mostrarMensajeError(mensaje) {
            var tooltip = document.getElementById('tooltip');
            tooltip.innerText = mensaje;
            tooltip.style.display = 'block';
            setTimeout(function() {
                tooltip.style.display = 'none';
            }, 3000); // Ocultar el globo flotante después de 3 segundos
        }

        // Validar el correo electrónico cuando se envíe el formulario 6238P@ye1810---contraseñade templatemonsters
        document.querySelector('form').addEventListener('submit', function(event) {
            var gmail = document.getElementById('gmail').value;
            if (!gmail.endsWith('@gmail.com')) {
                mostrarMensajeError('Por favor, ingrese una dirección de correo electrónico de Gmail.');
                event.preventDefault(); // Evitar que el formulario se envíe si el correo electrónico no es válido
            }
        });
    </script>
      <p class="or">
      Iniciar sesion con:
      </p>
      <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook"></i>
      </div>
      <div class="links">
        <p>¿Ya tienes cuenta?</p>
        <button id="signInButton">Iniciar Sesion</button>
      </div>
    </div>

    <div class="container" id="signIn">
        <h1 class="form-title">Iniciar Sesion</h1>
        <form method="post" action="uregister.php">
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="gmail" name="gmail" id="gmail" placeholder="Gmail" required>
              <label for="gmail">Gmail</label>
          </div>
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required>
              <label for="contraseña">Contraseña</label>
          </div>
          <p class="recover">
            <a href="#">Recordar Contraseña</a>
          </p>
         <input type="submit" class="btn" value="Registrarme" name="signIn">
        </form>
        <p class="or">
          Iniciar sesion con:
        </p>
        <div class="icons">
          <i class="fab fa-google"></i>
          <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
          <p>¿Aún no tienes cuenta?</p>
          <button id="signUpButton">Registrarme</button>
        </div>
      </div>
      <script src="uscript.js"></script>
      
</body>
</html>
