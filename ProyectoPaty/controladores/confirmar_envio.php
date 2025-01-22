<?php
session_start();


include "conexion.php";

// Obtener los datos de la sesión
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "";
$apellido1 = isset($_SESSION['apellido1']) ? $_SESSION['apellido1'] : "";
$apellido2 = isset($_SESSION['apellido2']) ? $_SESSION['apellido2'] : "";
$curp = isset($_SESSION['curp']) ? $_SESSION['curp'] : "";
$genero = isset($_SESSION['genero']) ? $_SESSION['genero'] : "";
$fechanac = isset($_SESSION['fechanac']) ? $_SESSION['fechanac'] : "";
$discapacidad = isset($_SESSION['discapacidad']) ? $_SESSION['discapacidad'] : "";
$calle = isset($_SESSION['calle']) ? $_SESSION['calle'] : "";
$Num = isset($_SESSION['Num']) ? $_SESSION['Num'] : "";
$Colonia = isset($_SESSION['Colonia']) ? $_SESSION['Colonia'] : "";
$CP = isset($_SESSION['CP']) ? $_SESSION['CP'] : "";
$edop = isset($_SESSION['edop']) ? $_SESSION['edop'] : "";
$municipio = isset($_SESSION['municipio']) ? $_SESSION['municipio'] : "";
$telefono = isset($_SESSION['telefono']) ? $_SESSION['telefono'] : "";
$Correo = isset($_SESSION['Correo']) ? $_SESSION['Correo'] : "";
$boleta = isset($_SESSION['boleta']) ? $_SESSION['boleta'] : "";
$Promedio = isset($_SESSION['Promedio']) ? $_SESSION['Promedio'] : "";
$escuelas = isset($_SESSION['escuelas']) ? $_SESSION['escuelas'] : "";

$otroEscuela = isset($_SESSION['otroEscuela']) ? $_SESSION['otroEscuela'] : "";
$otroDiscapacidad = isset($_SESSION['otroDiscapacidad']) ? $_SESSION['otroDiscapacidad'] : "";

$horario = isset($_SESSION['horario']) ? $_SESSION['horario'] : [];
$horarioAleatorio = isset($_SESSION['horarioAleatorio']) ? $_SESSION['horarioAleatorio'] : null;
$laboratorioAsignado = isset($_SESSION['laboratorioAsignado']) ? $_SESSION['laboratorioAsignado'] : null;



$verificarDuplicado = "SELECT * FROM persona WHERE curp = '$curp'";
$resultado = $conexion->query($verificarDuplicado);

if ($resultado->num_rows > 0) {
    // Si ya existe un registro con el mismo CURP, muestra un mensaje y redirige a modificar.php
    echo '<script>';
    echo 'alert("El CURP ya existe en la base de datos. Serás redirigido para modificar el registro.");';
    echo 'window.location.href = "modificar.php?' . http_build_query($_POST) . '";'; // Redirige a modificar.php con los datos en la URL
    echo '</script>';
    exit;


} else {
    // Si no hay duplicados, proceder con la inserción
    $insertar = "INSERT INTO persona (nombre, apellido1, apellido2, curp, genero, fechanac, discapacidad, otroDiscapacidad, calle, Num, Colonia, CP, edop, municipio, telefono, Correo, boleta, Promedio, escuelas, otroEscuela, horario, laboratorioAsignado) 
                VALUES ('$nombre', '$apellido1', '$apellido2', '$curp', '$genero', '$fechanac', '$discapacidad', '$otroDiscapacidad', '$calle', '$Num', '$Colonia', '$CP', '$edop', '$municipio','$telefono', '$Correo', '$boleta', '$Promedio', '$escuelas', '$otroEscuela','{$horario[$horarioAleatorio]}', '$laboratorioAsignado')";

    // Realizar la inserción en la base de datos
    if ($conexion->query($insertar) === TRUE) {
        // Redirige a una página de éxito o a donde necesites después de la inserción
        header('Location: exito.php');
        exit;
    } else {
        // Mostrar un mensaje de error en caso de falla
        echo '<script>';
        echo 'alert("Error al almacenar los datos. Por favor, inténtalo de nuevo.");';
        echo 'window.close();';  // Cierra la ventana actual
        echo '</script>';
        header("Location: procesar.php");
        exit;
    }
}





// Realizar la inserción en la base de datos


if ($conexion->query($insertar) === TRUE) {
    // Redirige a una página de éxito o a donde necesites después de la inserción
    header('exito.php');
} else {
    echo "Error: " . $insertar . "<br>" . $conexion->error;
    
}




$conexion->close();


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Registro Exitoso</title>
</head>
<body>

<!-- Contenido de la página de registro exitoso -->
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">¡Registro Exitoso!</h5>
            <p class="card-text">Tus datos se han registrado correctamente.</p>
            <a href="../index.php" class="btn btn-primary mt-3">Volver al inicio</a>
            <a target="_blank" class="btn btn-primary mt-3" href="comprobante.php">Imprimir PDF</a>
        </div>
    </div>
</div>

</body>
</html>