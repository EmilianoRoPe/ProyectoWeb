<?php
// Inicia la sesión
session_start();

// Verifica si el usuario ha iniciado sesión
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

include "conexion.php";

// Verifica si hay errores en la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

function validarYFormatearFecha($fechanac) {
    $date = DateTime::createFromFormat('Y-m-d', $fechanac);
    return $date ? $date->format('Y-m-d') : null;
}





// Manejar el formulario de actualización si se envió

    // Aquí deberías agregar la validación de datos antes de realizar la actualización
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Aquí deberías agregar la validación de datos antes de realizar la actualización
        $curp = isset($_POST['Curp']) ? $_POST['Curp'] : '';

        if (empty($curp)) {
            echo "CURP no válido.";
            exit;
        }

        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $apellido1 = isset($_POST['apellido1']) ? $_POST['apellido1'] : '';
        $apellido2 = isset($_POST['apellido2']) ? $_POST['apellido2'] : '';
        $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
        $fechanac = isset($_POST['fechanac']) ? $_POST['fechanac'] : '';
        $fechanac = validarYFormatearFecha($fechanac);

        if (!empty($fechanac)) {
            $fechanac = validarYFormatearFecha($fechanac);
    
            if (empty($fechanac)) {
                echo "La fecha de nacimiento es inválida.";
                exit;
            }
        }


    $discapacidad = isset($_POST['discapacidad']) ? $_POST['discapacidad'] : '';
    $otroDiscapacidad = isset($_POST['otroDiscapacidad']) ? $_POST['otroDiscapacidad'] : '';
    $calle = isset($_POST['calle']) ? $_POST['calle'] : '';
    $Num = isset($_POST['Num']) ? $_POST['Num'] : '';

    if (!is_numeric($Num) && $Num !== '') {
        echo "El campo 'Número' debe ser un valor numérico.";
        exit;
    }

    $Colonia = isset($_POST['Colonia']) ? $_POST['Colonia'] : '';
    $CP = isset($_POST['CP']) ? $_POST['CP'] : '';
    $edop = isset($_POST['edop']) ? $_POST['edop'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $Correo = isset($_POST['Correo']) ? $_POST['Correo'] : '';
    $boleta = isset($_POST['boleta']) ? $_POST['boleta'] : '';
    $escuelas = isset($_POST['escuelas']) ? $_POST['escuelas'] : '';
    $otroEscuela = isset($_POST['otroEscuela']) ? $_POST['otroEscuela'] : '';
    $horario = isset($_POST['horario']) ? $_POST['horario'] : '';
    $laboratorioAsignado = isset($_POST['laboratorioAsignado']) ? $_POST['laboratorioAsignado'] : '';
    

    // Consulta SQL de actualización
    $sqlUpdate = "UPDATE persona 
                  SET nombre='$nombre', apellido1='$apellido1', apellido2='$apellido2', genero='$genero',
                  fechanac=" . ($fechanac ? "'$fechanac'" : "NULL") . ",  discapacidad='$discapacidad', otroDiscapacidad='$otroDiscapacidad', calle='$calle',
                  Num=" . ($Num !== '' ? $Num : "NULL") . ", Colonia='$Colonia', CP='$CP', edop='$edop', telefono='$telefono', Correo='$Correo', boleta='$boleta',
                  escuelas='$escuelas', otroEscuela='$otroEscuela', horario='$horario', laboratorioAsignado='$laboratorioAsignado'
                  
                  WHERE Curp='$curp'";



    if ($conexion->query($sqlUpdate) === TRUE) {
        echo "";
    } else {
        echo "" . $conexion->error;
    }
}



$sql = "SELECT * FROM persona";
$resultado = $conexion->query($sql);

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['eliminar_registro'])) {
        // Procesar eliminación
        $CurpEliminar = $_POST['eliminar_registro'];

        // Consulta SQL de eliminación
        $sqlDelete = "DELETE FROM persona WHERE curp = '$CurpEliminar'";

        if ($conexion->query($sqlDelete) === TRUE) {
            echo "";
        } else {
            echo " " . $conexion->error;
        }
    } elseif (isset($_POST['actualizar_registro'])) {
        // Procesar actualización
        $curp = isset($_POST['Curp']) ? $_POST['Curp'] : '';

        // Resto del código de actualización...
    }
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Estilos personalizados */
        .table th, .table td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px; /* Ajusta según sea necesario */
        }

        @media (max-width: 768px) {
            .table th, .table td {
                max-width: none;
            }
        }
    </style>

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
                    <a class="nav-link" href="../formulario.php">Formulario</a>
                </li>
                <a class="navbar-brand" href="../index.php">
                    <img src="img/escomlogo.png" alt="LogoIpn" style="width: 60px;">
                </a>  
            </ul>
        </div>
    </div>
</nav>

<!-- Contenedor para la tabla y otros elementos -->
<div class="container mt-5">
    <h2 class="mb-4">Bienvenido, <?php echo $usuario; ?></h2>
    <!-- Muestra los registros de la base de datos aquí -->
    <?php
    if (!empty($mensaje)) {
        echo '<div class="alert alert-info">' . $mensaje . '</div>';
    }
    if ($resultado->num_rows > 0) {
        echo "<div class='table-responsive'>
                <table class='table table-bordered table-striped'>
                    <thead class='thead-light'>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido1</th>
                            <th>Apellido2</th>
                            <th>CURP</th>
                            <th>Género</th>
                            <th>Fecha Nacimiento</th>
                            <th>Discapacidad</th>
                            <th>Otro Discapacidad</th>
                            <th>Calle</th>
                            <th>Número</th>
                            <th>Colonia</th>
                            <th>Codigo Postal</th>
                            <th>Estado</th>
                            <th>Municipio</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Boleta</th>
                            <th>Escuelas</th>
                            <th>Otro Escuela</th>
                            <th>Horario</th>
                            <th>Laboratorio Asignado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>";

        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                    <form method='post' action=''>
                        <td><input type='text' class='form-control form-control-sm' name='nombre' value='" . $fila["nombre"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='apellido1' value='" . $fila["apellido1"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='apellido2' value='" . $fila["apellido2"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='Curp' value='" . $fila["curp"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='genero' value='" . $fila["genero"] . "'></td>
                        <td><input type='date' class='form-control form-control-sm' name='fechanac' value='". $fila["fechanac"] . "'> </td>
                        <td><input type='text' class='form-control form-control-sm' name='discapacidad' value='" . $fila["discapacidad"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='otroDiscapacidad' value='" . $fila["otroDiscapacidad"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='calle' value='" . $fila["calle"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='Num' value='" . $fila["Num"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='Colonia' value='" . $fila["Colonia"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='CP' value='" . $fila["CP"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='edop' value='" . $fila["edop"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='municipio' value='" . $fila["municipio"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='telefono' value='" . $fila["telefono"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='Correo' value='" . $fila["Correo"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='boleta' value='" . $fila["boleta"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='escuelas' value='" . $fila["escuelas"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='otroEscuela' value='" . $fila["otroEscuela"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='horario' value='" . $fila["horario"] . "'></td>
                        <td><input type='text' class='form-control form-control-sm' name='laboratorioAsignado' value='" . $fila["laboratorioAsignado"] . "'></td>
                        <td>
                            <button type='submit' class='btn btn-danger btn-sm' name='eliminar_registro' value='" . $fila["curp"] . "' onclick=\"return confirm('¿Seguro que deseas eliminar este registro?')\">Eliminar</button>
                            <button type='submit' class='btn btn-primary btn-sm' name='actualizar_registro' value='" . $fila["curp"] . "'>Actualizar</button>
                        </td>
                    </form>
                </tr>";
        
        }

        echo "</tbody></table></div>";
    } else {
        echo "No se encontraron registros.";
    }
    ?>
</div>
<form method="post" action="">
    <button type="submit" class="btn btn-danger" name="cerrar_sesion">Cerrar Sesión</button>
</form>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('.delete-btn').on('click', function () {
            var curp = $(this).data('curp');

            $.ajax({
                type: 'POST',
                url: 'ajax_handler.php', // Cambia esto al nombre de tu script de manejo de AJAX
                data: { eliminar_registro: 1, Curp: curp },
                success: function (response) {
                    // Maneja la respuesta según tus necesidades
                    console.log(response);

                    // Actualiza la tabla o realiza otras acciones necesarias
                },
                error: function (error) {
                    // Maneja el error según tus necesidades
                    console.error(error);
                }
            });
        });

        $('.update-btn').on('click', function () {
            var curp = $(this).data('curp');
            var form = $(this).closest('tr').find('input');

            $.ajax({
                type: 'POST',
                url: 'ajax_handler.php', // Cambia esto al nombre de tu script de manejo de AJAX
                data: form.serialize() + '&actualizar_registro=1',
                success: function (response) {
                    // Maneja la respuesta según tus necesidades
                    console.log(response);

                    // Actualiza la tabla o realiza otras acciones necesarias
                },
                error: function (error) {
                    // Maneja el error según tus necesidades
                    console.error(error);
                }
            });
        });
    });
</script>
</body>
</html>