<?php
session_start();



$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "Nombre no proporcionado";
$apellido1 = isset($_SESSION['apellido1']) ? $_SESSION['apellido1'] : "Apellido 1 no proporcionado";
$apellido2 = isset($_SESSION['apellido2']) ? $_SESSION['apellido2'] : "Apellido 2 no proporcionado";
$curp = isset($_SESSION['curp']) ? $_SESSION['curp'] : "CURP no proporcionada";
$genero = isset($_SESSION['genero']) ? $_SESSION['genero'] : "Género no proporcionado";
$fechanac = isset($_SESSION['fechanac']) ? $_SESSION['fechanac'] : "Fecha no proporcionado";
$discapacidad = isset($_SESSION['discapacidad']) ? $_SESSION['discapacidad'] : "Discapacidad no proporcionada";
$calle = isset($_SESSION['calle']) ? $_SESSION['calle'] : "Calle no proporcionada";
$Num = isset($_SESSION['Num']) ? $_SESSION['Num'] : "Número no proporcionado";
$Colonia = isset($_SESSION['Colonia']) ? $_SESSION['Colonia'] : "Colonia no proporcionada";
$CP = isset($_SESSION['CP']) ? $_SESSION['CP'] : "Código Postal no proporcionado";
$edop = isset($_SESSION['edop']) ? $_SESSION['edop'] : "Estado no proporcionado";
$telefono = isset($_SESSION['telefono']) ? $_SESSION['telefono'] : "Teléfono no proporcionado";
$Correo = isset($_SESSION['Correo']) ? $_SESSION['Correo'] : "Correo no proporcionado";
$boleta = isset($_SESSION['boleta']) ? $_SESSION['boleta'] : "Boleta no proporcionada";
$escuelas = isset($_SESSION['escuelas']) ? $_SESSION['escuelas'] : "Escuelas no proporcionadas";

$otroEscuela = isset($_SESSION['otroEscuela']) ? $_SESSION['otroEscuela'] : "";
$otroDiscapacidad = isset($_SESSION['otroDiscapacidad']) ? $_SESSION['otroDiscapacidad'] : "";

$horarioAleatorio = isset($_SESSION['horarioAleatorio']) ? $_SESSION['horarioAleatorio'] : null;
$laboratorioAsignado = isset($_SESSION['laboratorioAsignado']) ? $_SESSION['laboratorioAsignado'] : null;

$mostrarOtro1 = ($escuelas == 'Otro');
$mostrarOtro2 = ($discapacidad == 'Otro');

$html = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Comprobante</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f2f2f2;
            padding: 10px;
        }
        header img {
            max-width: 150px;
            height: auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Times New Roman', serif;
        }
        .section {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
        .imgI
        {
            width: 55px;
            float:left;
        }
        .imgE
        {
            width: 85px;
            float:right;
        }
    </style>
</head>
<body>

    <header>
        <img src='../img/ipnlogo.png' class='imgI'>
        <h2>Comprobante de Datos</h2>
        <img src='../img/escomlogo.png' class='imgE'>
        <br>
    </header>

    <div class='section'>
        <h3>Datos Personales</h3>
        <p>Nombre: $nombre</p>
        <p>Apellido Paterno: $apellido1</p>
        <p>Apellido Materno: $apellido2</p>
        <p>CURP: $curp</p>
        <p>Género: $genero</p>
        <p>Fecha de nacimiento: $fechanac</p>
        <p>Discapacidad: " . ($mostrarOtro2 ? $otroDiscapacidad : $discapacidad) . "</p>
        <p>Calle: $calle</p>
        <p>Número: $Num</p>
        <p>Colonia: $Colonia</p>
        <p>Código Postal: $CP</p>
        <p>Estado: $edop</p>
        <p>Teléfono: $telefono</p>
        <p>Correo Electrónico: $Correo</p>
    </div>

    <div class='section'>
        <h3>Información Académica</h3>
        <p>Número de Boleta: $boleta</p>
        <p>Escuela de Procedencia: " . ($mostrarOtro1 ? $otroEscuela : $escuelas) . "</p>
    </div>

    <div class='section'>
        <h3>Asignaciones</h3>
        <p>Laboratorio Asignado: Laboratorio $laboratorioAsignado</p>
        <p>Horario de Examen: " . (
            isset($horarioAleatorio) && isset($_SESSION['horario'][$horarioAleatorio]) ?
            $_SESSION['horario'][$horarioAleatorio] : "Horario no disponible"
        ) . "</p>
    </div>

</body>
</html>
";
require '../dompdf/autoload.inc.php';

// Inicializa Dompdf
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream("comprobante.pdf", array('Attachment' => false));

session_unset();
session_destroy();
?>