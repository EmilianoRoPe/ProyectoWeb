<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/procesar.css">
  <script src="../js/jquery-3.7.1.min.js"></script>

  <title>Procesar</title>
</head>
<body>

  <!--Barra de navegacion-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php"><img src="../img/ipnlogo.png" alt="LogoIpn" style="width: 45px;">Registro Nuevo Ingreso (Enero 2024)</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><br><a class="nav-link active" aria-current="page" href="../index.php">Inicio</a></li>
          <li class="nav-item"><br><a class="nav-link" href="../formulario.php">Formulario</a></li>
          <li class="nav-item"><br><a class="nav-link" href="../controladores/administrador.php">Administrador</a></li>
          <a class="navbar-brand" href="../index.php"><img src="../img/escomlogo.png" alt="LogoIpn" style="width: 80px;"></a>  
        </ul>
      </div>
    </div>
  </nav>


<?php


session_start();


// Obtener los datos del formulario
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$apellido1 = isset($_POST['apellido1']) ? $_POST['apellido1'] : "";
$apellido2 = isset($_POST['apellido2']) ? $_POST['apellido2'] : "";
$curp = isset($_POST['curp']) ? $_POST['curp'] : "";
$genero = isset($_POST['genero']) ? $_POST['genero'] : "";
$fechanac = isset($_POST['fechanac']) ? $_POST['fechanac'] : "";
$discapacidad = isset($_POST['discapacidad']) ? $_POST['discapacidad'] : "";
$calle = isset($_POST['calle']) ? $_POST['calle'] : "";
$Num = isset($_POST['Num']) ? $_POST['Num'] : "";
$Colonia = isset($_POST['Colonia']) ? $_POST['Colonia'] : "";
$CP = isset($_POST['CP']) ? $_POST['CP'] : "";
$edop = isset($_POST['edop']) ? $_POST['edop'] : "";

$municipio = isset($_POST['municipio']) ? $_POST['municipio'] : "";
$muni = isset($_POST['muni']) ? $_POST['muni'] : "";

$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
$Correo = isset($_POST['Correo']) ? $_POST['Correo'] : "";
$boleta = isset($_POST['boleta']) ? $_POST['boleta'] : "";
$Promedio = isset($_POST['Promedio']) ? $_POST['Promedio'] : "";
$escuelas = isset($_POST['escuelas']) ? $_POST['escuelas'] : "";

$otroEscuela = isset($_SESSION['otroEscuela']) ? $_SESSION['otroEscuela'] : "";
$otroDiscapacidad = isset($_SESSION['otroDiscapacidad']) ? $_SESSION['otroDiscapacidad'] : "";

$numAlumnos = isset($_POST['numAlumnos']) ? $_POST['numAlumnos'] : 0;

$mostrarOtro1 = ($escuelas == 'Otro');
$mostrarOtro2 = ($discapacidad == 'Otro');


// Almacenar los datos en variables de sesión

$_SESSION['nombre'] = $nombre;
$_SESSION['apellido1'] = $apellido1;
$_SESSION['apellido2'] = $apellido2;
$_SESSION['curp'] = $curp;
$_SESSION['genero'] = $genero;
$_SESSION['fechanac'] = $fechanac;
$_SESSION['discapacidad'] = $discapacidad;
$_SESSION['calle'] = $calle;
$_SESSION['Num'] = $Num;
$_SESSION['Colonia'] = $Colonia;
$_SESSION['CP'] = $CP;
$_SESSION['edop'] = $edop;
$_SESSION['municipio'] = $municipio;
$_SESSION['munI'] = $muni;
$_SESSION['telefono'] = $telefono;
$_SESSION['Correo'] = $Correo;
$_SESSION['boleta'] = $boleta;
$_SESSION['Promedio'] = $Promedio;
$_SESSION['escuelas'] = $escuelas;
$_SESSION['otroEscuela'] = $mostrarOtro1 ? (isset($_POST['otroEscuela']) ? $_POST['otroEscuela'] : "") : "";
$_SESSION['otroDiscapacidad'] = $mostrarOtro2 ? (isset($_POST['otroDiscapacidad']) ? $_POST['otroDiscapacidad'] : "") : "";

if ($escuelas == 'Otro') {
  $_SESSION['otroEscuela'] = isset($_POST['otroEscuela']) ? $_POST['otroEscuela'] : "";
}

if ($discapacidad == 'Otro') {
  $_SESSION['otroDiscapacidad'] = isset($_POST['otroDiscapacidad']) ? $_POST['otroDiscapacidad'] : "";
}


//Generar horario.

function asignarSalon($numAlumnos) {
  // Definir la capacidad máxima por salón y el número de laboratorios disponibles
  $capacidadSalon = 30;
  $numLaboratorios = 6;

  // Calcular el número total de salones disponibles
  $numSalones = $capacidadSalon * $numLaboratorios;

  // Calcular el número de grupos necesarios
  $numGrupos = ceil($numAlumnos / $capacidadSalon);

  // Verificar que haya suficientes salones disponibles
  if ($numGrupos <= $numSalones) {
    return $numGrupos;
  } else {
    // Si no hay suficientes salones, mostrar un mensaje de error o tomar alguna acción adicional
    die("Error: No hay suficientes salones disponibles para el número de alumnos registrados.");
  }
}

function generarHorario() {
  $horarios = ['09:00', '10:45', '12:30', '14:15', '16:00', '17:45'];
  shuffle($horarios);
  return $horarios;
}

// Llamar a la función para asignar el salón solo si la sesión aún no se ha iniciado
if (!isset($_SESSION['horario'])) {
  $_SESSION['horario'] = generarHorario();
}
// Llamar a la función para generar el horario solo si la sesión aún no se ha iniciado
if (!isset($_SESSION['horarioAleatorio'])) {
  $_SESSION['horarioAleatorio'] = array_rand($_SESSION['horario'], 1);
}

// Elegir un horario aleatorio si aún no se ha asignado
if (!isset($_SESSION['laboratorioAsignado'])) {
  $_SESSION['laboratorioAsignado'] = mt_rand(1, 6);
}

// Obtener los valores de la sesión
// $numGruposAsignados = $_SESSION['numGruposAsignados'];
$horario = $_SESSION['horario'];
$horarioAleatorio = $_SESSION['horarioAleatorio'];
$laboratorioAsignado = $_SESSION['laboratorioAsignado'];

// Elegir un laboratorio aleatorio si aún no se ha asignado

if (!isset($_SESSION['laboratorioAsignado']) || isset($_POST['resetForm'])) {
  $_SESSION['laboratorioAsignado'] = mt_rand(1, 6);
}




?>

<div class="container mt-4">
        <div class="card">
            <div class="card-body">
            <div class="card2 bg-#800000 text-center text-white"> <h3>Modificar datos.</h3></div>
            <hr style="color:#800000">
                
                <p class="card-text"><strong>Nombre:</strong> <?php echo $nombre; ?></p>
                <p class="card-text"><strong>Apellido Paterno:</strong> <?php echo $apellido1; ?></p>
                <p class="card-text"><strong>Apellido Materno:</strong> <?php echo $apellido2; ?></p>
                <p class="card-text"><strong>CURP:</strong> <?php echo $curp; ?></p>
                <p class="card-text"><strong>Género:</strong> <?php echo $genero; ?></p>
                <p class="card-text"><strong>Fecha de Nacimiento:</strong> <?php echo $fechanac; ?></p>
                <p class="card-text"><strong>Discapacidad:</strong> 
                <?php
                    if ($mostrarOtro2) {
                        echo isset($_POST['otroDiscapacidad']) ? $_POST['otroDiscapacidad'] : "";
                    } else {
                        echo $discapacidad;
                    }
                ?>
                </p>
                <p class="card-text"><strong>Calle:</strong> <?php echo $calle; ?></p>
                <p class="card-text"><strong>Número:</strong> <?php echo $Num; ?></p>
                <p class="card-text"><strong>Colonia:</strong> <?php echo $Colonia; ?></p>
                <p class="card-text"><strong>Código Postal:</strong> <?php echo $CP; ?></p>
                <p class="card-text"><strong>Estado de Procedencia:</strong> <?php echo $edop; ?></p>
              

                <p class="card-text"><strong>Teléfono:</strong> <?php echo $telefono; ?></p>
                <p class="card-text"><strong>Correo Electrónico:</strong> <?php echo $Correo; ?></p>
                <p class="card-text"><strong>Número de Boleta:</strong> <?php echo $boleta; ?></p>
                <p class="card-text"><strong>Promedio:</strong> <?php echo $Promedio; ?></p>
                <p class="card-text"><strong>Escuela de Procedencia:</strong> 
                <?php
                    if ($mostrarOtro1) {
                        echo isset($_POST['otroEscuela']) ? $_POST['otroEscuela'] : "";
                    } else {
                        echo $escuelas;
                    }
                ?>
                </p>



                <p class="card-text"><strong>Horario de Exámen:</strong>
  <?php
    if (isset($horario) && is_array($horario) && isset($horario[$horarioAleatorio])) {
      echo $horario[$horarioAleatorio];
    } else {
      echo "Horario no disponible";
    }
    ?>
    </p>

<p class="card-text"><strong>Laboratorio Asignado:</strong> Laboratorio <?php echo $laboratorioAsignado; ?></p>



                <div class="card-footer text-center mt-4">   
             
                <a href="modificar.php">
                    <button type="button" class="btn btn-guinda mt-3">Modificar formulario</button>
                </a>
              
                <form action="confirmar_envio.php" method="post" style="display: inline;">
                <button type="submit" class="btn btn-guinda mt-3">Confirmar Envío</button>
              </div>
            

            </form>



            </div>
        </div>
    </div>


</body>

<script src="../js/validaciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>
 


  
