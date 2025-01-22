<?php
session_start();

include "conexion.php";

// Obtener los datos de la sesión
$curp = isset($_SESSION['curp']) ? $_SESSION['curp'] : "";

// Verificar si ya existe un registro con el mismo CURP
$verificarDuplicado = "SELECT * FROM persona WHERE curp = '$curp'";
$resultado = $conexion->query($verificarDuplicado);

if ($resultado) {
    // Si hay algún resultado, significa que el CURP existe en la base de datos
    if ($resultado->num_rows > 0) {
        // Obtener otros datos de la sesión
        $nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "";
        $apellido1 = isset($_SESSION['apellido1']) ? $_SESSION['apellido1'] : "";
        $apellido2 = isset($_SESSION['apellido2']) ? $_SESSION['apellido2'] : "";
        $genero = isset($_SESSION['genero']) ? $_SESSION['genero'] : "";
        $fechanac = isset($_SESSION['fechanac']) ? $_SESSION['fechanac'] : "";
        $discapacidad = isset($_SESSION['discapacidad']) ? $_SESSION['discapacidad'] : "";
        $otroDiscapacidad = isset($_SESSION['otroDiscapacidad']) ? $_SESSION['otroDiscapacidad'] : "";
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
        $horario = isset($_SESSION['horario']) ? $_SESSION['horario'] : [];
        $horarioAleatorio = isset($_SESSION['horarioAleatorio']) ? $_SESSION['horarioAleatorio'] : null;
        $laboratorioAsignado = isset($_SESSION['laboratorioAsignado']) ? $_SESSION['laboratorioAsignado'] : null;

        // Actualizar los datos en la base de datos
        $actualizar = "UPDATE persona SET nombre = '$nombre', apellido1 = '$apellido1', apellido2 = '$apellido2', genero = '$genero', fechanac = '$fechanac', discapacidad = '$discapacidad', otroDiscapacidad = '$otroDiscapacidad', calle = '$calle', Num = '$Num', Colonia = '$Colonia', CP = '$CP', edop = '$edop', municipio = '$municipio', telefono = '$telefono', Correo = '$Correo', boleta = '$boleta', Promedio = '$Promedio', escuelas = '$escuelas', otroEscuela = '$otroEscuela', horario = '{$horario[$horarioAleatorio]}', laboratorioAsignado = '$laboratorioAsignado' WHERE curp = '$curp'";

        // Realizar la actualización en la base de datos
        if ($conexion->query($actualizar) === TRUE) {
            // Redirige a una página de éxito o a donde necesites después de la actualización
            header('Location: exitoAdmin2.php');
            exit;
        } else {
            // Mostrar un mensaje de error en caso de falla
            echo '<script>';
            echo 'alert("Error al actualizar los datos. Por favor, inténtalo de nuevo.");';
            echo 'window.close();';  // Cierra la ventana actual
            echo '</script>';
            header("Location: procesar.php");
            exit;
        }
    } else {
        // Si no hay resultados, el CURP no existe en la base de datos
        echo '<script>';
        echo 'alert("El CURP no existe en la base de datos. No se puede actualizar.");';
        echo 'window.location.href = "procesar.php";'; // Redirige a procesar.php
        echo '</script>';
        exit;
    }
} else {
    // Si hay un error en la consulta
    echo "Error en la consulta: " . $conexion->error;
}

$conexion->close();
?>