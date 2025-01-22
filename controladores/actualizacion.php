<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Actualización Exitosa</title>
    <!-- Agrega tus enlaces a CSS o Bootstrap si es necesario -->
</head>
<body>
    <div class="container mt-5">
        <?php
        if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'exito') {
            echo '<div class="alert alert-success" role="alert">Datos actualizados con éxito.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Ha ocurrido un error al actualizar los datos.</div>';
        }
        ?>
        <a class="btn btn-primary" href="gestion.php">Volver a la pantalla de gestión</a>
    </div>
</body>
</html>