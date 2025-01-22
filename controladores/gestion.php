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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estiloadmin.css">
    <link rel="stylesheet" href="../css/estilosindex.css">
    <link rel="stylesheet" href="../css/estilosgestion.css">

    <style>
        /* Agrega estilos personalizados aquí */
        body {
            margin-top: 50px; /* Margen superior para el cuerpo de la página */
        }

        .center-message {
            text-align: center;
            margin-bottom: 20px; /* Margen inferior del mensaje */
        }

        /* Estilo para aumentar el tamaño de la tabla */
        .table-responsive {
            overflow-x: auto;
            max-width: 100%;
        }

        table {
            width: 120%; /* Aumentar el tamaño de la tabla al 120% del ancho del contenedor */
        }
    </style>
    
</head>
<body>

<h2 class="mb-4 center-message">Bienvenido, <?php echo $usuario; ?></h2>

<<div class="container mt-5">
    <div class="row justify-content-end">
        <div class="col-md-2">
            <button type='button' class='btn btn-primary btn-sm btn-create' onclick='crearRegistro()'>Crear registro</button>
        </div>
    </div>

    

    <div class="row justify-content-center">
        <div class="col-md-12">
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
                            <th>Apellido Paterno </th>
                            <th>Apellido Materno</th>
                            <th>CURP</th>
                            <th>Género</th>
                            <th>Fecha Nacimiento</th>
                            <th>Discapacidad</th>
                            <th>Otro Discapacidad</th>
                            <th>Calle</th>
                            <th>Número</th>
                            <th>Colonia</th>
                            <th>Código Postal</th>
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
                         
                            <button type='button' class='btn btn-success btn-sm' onclick='editarRegistro(\"" . $fila["curp"] . "\")'>Editar</button>
                        </td>
                      
                    </form>
                </tr>";
        
        }

        echo "</tbody></table></div>";
    } else {
        echo "No se encontraron registros.";
    }
    ?>


<div class="row justify-content-center">
        <div class="col-md-2">
            <form method="post" action="" class="btn-logout">
                <button type="submit" class="btn btn-dark" name="cerrar_sesion">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function eliminarRegistro(curp) {
        if (confirm('¿Seguro que deseas eliminar este registro?')) {
            // Realizar la eliminación mediante AJAX
            $.ajax({
                type: 'POST',
                url: 'eliminar_registro.php', // Reemplaza esto con la URL correcta para manejar la eliminación en tu servidor
                data: { curp: curp },
                success: function (response) {
                    // Maneja la respuesta según tus necesidades
                    console.log(response);

                    // Recarga la tabla después de la eliminación
                    cargarTabla();
                },
                error: function (error) {
                    // Maneja el error según tus necesidades
                    console.error(error);
                }
            });
        }
    }

    function cargarTabla() {
        // Recargar la tabla después de la eliminación
        // Puedes cargar la tabla mediante AJAX o simplemente recargando la página completa si prefieres
        location.reload();
    }

    function editarRegistro(curp) {
        // Redirige a modificarAdmin.php con el parámetro de CURP
        window.location.href = 'modificarAdmin2.php?curp=' + curp;
    }

    function crearRegistro() {
        // Redirige a formularioAdmin.php
        window.location.href = 'formularioAdmin.php';
    }
</script>


<script>
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });
    </script>


</body>
</html>