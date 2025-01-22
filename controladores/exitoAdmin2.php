<?php


session_start();


if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
  // Si no ha iniciado sesión, redirecciona al formulario de inicio de sesión
  header('Location: administrador.php');
  exit;
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
  // Si la sesión ha expirado (30 minutos), cierra la sesión y redirecciona al formulario de inicio de sesión
  session_unset();     // unset $_SESSION variable for the run-time
  session_destroy();   // destroy session data in storage
  header('Location: administrador.php');
  exit;
}

$_SESSION['LAST_ACTIVITY'] = time();

if (isset($_POST['cerrar_sesion'])) {
  session_unset();
  session_destroy();
  header('Location: administrador.php');
  exit;
}

$usuario = $_SESSION['usuario'];
?>


<?php


session_start();


if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
  // Si no ha iniciado sesión, redirecciona al formulario de inicio de sesión
  header('Location: administrador.php');
  exit;
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
  // Si la sesión ha expirado (30 minutos), cierra la sesión y redirecciona al formulario de inicio de sesión
  session_unset();     // unset $_SESSION variable for the run-time
  session_destroy();   // destroy session data in storage
  header('Location: administrador.php');
  exit;
}

$_SESSION['LAST_ACTIVITY'] = time();

if (isset($_POST['cerrar_sesion'])) {
  session_unset();
  session_destroy();
  header('Location: administrador.php');
  exit;
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Registro Exitoso</title>
  <style>
    /*Parte responsiva*/
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
    }

    .card {
      width: 100%;
      max-width: 400px;
    }
  </style>
</head>
<body>

<!-- Contenido de la página de registro exitoso -->
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">¡Edición Exitosa! ✅</h2>
            <p class="card-text">Tus datos se han actualizado correctamente.</p>
            <a href="gestion.php" class="btn btn-primary mt-3">Volver a gestionar</a>
            
        </div>
    </div>
</div>

<script>
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });
    </script>

</body>
</html>