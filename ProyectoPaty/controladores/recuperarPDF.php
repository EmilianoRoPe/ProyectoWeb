<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Obtener el CURP de la URL
$curpFromGet = isset($_GET['curp']) ? $_GET['curp'] : null;

// Verificar si el CURP se proporcionó en la URL
if (!$curpFromGet) {
    echo "Error: No se proporcionó el CURP.";
    exit;
}

// Consultar la base de datos para obtener los datos correspondientes al CURP
$sql = "SELECT * FROM persona WHERE curp = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $curpFromGet);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontraron datos
if ($result->num_rows > 0) {
    // Obtener los datos del primer resultado (asume que el CURP es único)
    $row = $result->fetch_assoc();

    // Extraer los datos de la base de datos
    $nombre = $row['nombre'];
    $apellido1 = $row['apellido1'];
    $apellido2 = $row['apellido2'];
    $curp = $row['curp'];
    $genero = $row['genero'];
    $fechanac = $row['fechanac'];
    $discapacidad = $row['discapacidad'];
    $calle = $row['calle'];
    $Num = $row['Num'];
    $Colonia = $row['Colonia'];
    $CP = $row['CP'];
    $edop = $row['edop'];
    $telefono = $row['telefono'];
    $Correo = $row['Correo'];
    $boleta = $row['boleta'];
    $escuelas = $row['escuelas'];
    $otroEscuela = $row['otroEscuela'];
    $otroDiscapacidad = $row['otroDiscapacidad'];
    $horarioAleatorio = $row['horarioAleatorio'];
    $laboratorioAsignado = $row['laboratorioAsignado'];

    $mostrarOtro1 = ($escuelas == 'Otro');
    $mostrarOtro2 = ($discapacidad == 'Otro');


    // Renderizar el PDF
    $html = "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Comprobante</title>
    </head>
    <body>
        <h2>Comprobante de Datos</h2>
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
        <p>Número de Boleta: $boleta</p>
        <p>Escuela de Procedencia: " . ($mostrarOtro1 ? $otroEscuela : $escuelas) . "</p>
        <p>Laboratorio Asignado: Laboratorio $laboratorioAsignado</p>
        <p>Horario de Examen: " . (
            isset($horarioAleatorio) && isset($_SESSION['horario'][$horarioAleatorio]) ? 
            $_SESSION['horario'][$horarioAleatorio] : "Horario no disponible"
        ) . "</p>
    </body>
    </html>
    ";

    // ... (continuar con el resto del código para generar y descargar el PDF)
} else {
    echo "Error: No se encontraron datos para el CURP proporcionado.";
}


require '../vendor/autoload.php';

use Dompdf\Dompdf;

// Crear la instancia Dompdf
$dompdf = new Dompdf();

// Cargar el contenido HTML
$dompdf->loadHtml($html);

// Establecer el tamaño del papel
$dompdf->setPaper('letter');

// Renderizar el PDF
$dompdf->render();

// Descargar el PDF con el nombre "comprobante.pdf"
$dompdf->stream("comprobante.pdf", array('Attachment' => false));

// Limpiar y destruir la sesión
session_unset();
session_destroy();

// Cerrar la conexión a la base de datos
$stmt->close();
$conexion->close();
?>

