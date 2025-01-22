<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Iniciar sesión como Administrador</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Barra de navegación -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img src="img/ipnlogo.png" alt="LogoIpn" style="width: 40px;">
            Registro Nuevo Ingreso (Enero 2024)</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="div-flex" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="formulario.php">Formulario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="controladores/administrador.php">Administrador</a>
              </li>
          <a class="navbar-brand" href="../index.php">
                <img src="img/escomlogo.png" alt="LogoIpn" style="width: 60px;">
          </a>  
            </ul>
          </div>
        </div>
      </nav>

<div class="container mt-5">
  <h2>Iniciar sesión como Administrador</h2>
  <form action="procesar_administrador.php" method="post">
    
    <div class="form-group">
      <label for="correo">Correo Electrónico:</label>
      <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingresa el correo electrónico" required>
    </div>

    <div class="form-group">
      <label for="contrasena">Contraseña:</label>
      <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Ingresa la contraseña" required>
    </div>

    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
