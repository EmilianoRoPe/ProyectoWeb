<?php
session_start();

include '../js/municipiosporestado.php';
// Obtiene los datos almacenados en las variables de sesión
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "";
$apellido1 = isset($_SESSION['apellido1']) ? $_SESSION['apellido1'] : "";
$apellido2 = isset($_SESSION['apellido2']) ? $_SESSION['apellido2'] : "";
$curp = isset($_SESSION['curp']) ? $_SESSION['curp'] : "";
$genero = isset($_SESSION['genero']) ? $_SESSION['genero'] : "";
$fechanac = isset($_SESSION['fechanac']) ? $_SESSION['fechanac'] : "";
$calle = isset($_SESSION['calle']) ? $_SESSION['calle'] : "";
$Num = isset($_SESSION['Num']) ? $_SESSION['Num'] : "";
$Colonia = isset($_SESSION['Colonia']) ? $_SESSION['Colonia'] : "";
$CP = isset($_SESSION['CP']) ? $_SESSION['CP'] : "";
$edop = isset($_SESSION['edop']) ? $_SESSION['edop'] : "";
$muni = isset($_SESSION['muni']) ? $_SESSION['muni'] : "";
$municipio = isset($_SESSION['municipio']) ? $_SESSION['municipio'] : "";


$telefono = isset($_SESSION['telefono']) ? $_SESSION['telefono'] : "";
$correo = isset($_SESSION['Correo']) ? $_SESSION['Correo'] : "";
$boleta = isset($_SESSION['boleta']) ? $_SESSION['boleta'] : "";
$Promedio = isset($_SESSION['Promedio']) ? $_SESSION['Promedio'] : "";


$escuelas = isset($_SESSION['escuelas']) ? $_SESSION['escuelas'] : "";
$discapacidad = isset($_SESSION['discapacidad']) ? $_SESSION['discapacidad'] : "";

$mostrarOtro1 = ($escuelas == 'Otro');
$mostrarOtro2 = ($discapacidad == 'Otro');
$otroEscuela = isset($_SESSION['otroEscuela']) ? $_SESSION['otroEscuela'] : "";
$otroDiscapacidad = isset($_SESSION['otroDiscapacidad']) ? $_SESSION['otroDiscapacidad'] : "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilosindex.css">
    <script src="../js/validacionesmodi.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
         $(document).ready(function () {
            var municipioSeleccionado = <?php echo json_encode($muni); ?>;

            // Cuando cambia el estado
            $('#edop').change(function () {
                var estado = $(this).val();
                // Obtener municipios correspondientes al estado seleccionado
                var municipios = <?php echo json_encode($municipiosPorEstado); ?>;
                var municipiosEstado = municipios[estado];

                // Limpiar y actualizar la lista de municipios
                $('#municipio').empty();
                $.each(municipiosEstado, function (index, value) {
                    var selected = (municipioSeleccionado == value) ? 'selected' : '';
                    $('#municipio').append('<option value="' + value + '" ' + selected + '>' + value + '</option>');
                });
            });

            // Inicializar la lista de municipios al cargar la página
            $('#edop').trigger('change');
        });
    </script>
</head>


</head>

<body>

    <!-- Barra de navegación -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img src="../img/ipnlogo.png" alt="LogoIpn" style="width: 40px;">
            Registro Nuevo Ingreso (Enero 2024)</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="div-flex" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../formulario.php">Formulario</a>
              </li>
          <a class="navbar-brand" href="index.php">
                <img src="../img/escomlogo.png" alt="LogoIpn" style="width: 60px;">
          </a>  
            </ul>
          </div>
        </div>
      </nav>


    <!-- Formulario. -->

    <section class="content">
      <div class="container extended-form mx-auto">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="card bg-#800000 text-center text-white"> <h3>Modificar datos.</h3></div>
            <form action="procesar.php" method="post">
              <div class="card-body">
                <div class="row">
                  
                    <hr style="color:#800000">

                     <!-- Datos Identidad -->

                    <div class="col-md-4 text-center card-body column">
                        <h2>Datos Identidad</h2>

                    <div class="form-group">
                        <label for="nombre">Nombre(s)</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>" placeholder="Ingrese su Nombre(s)" required>
                    </div>

                    <div class="form-group">
                      <label for="nombre">Apellido paterno</label>
                      <input type="text" class="form-control" name="apellido1" id="apellido1" value="<?php echo $apellido1; ?>"  placeholder="Ingrese su Apellido paterno" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="nombre">Apellido materno</label>
                      <input type="text"  class="form-control" name="apellido2" id="apellido2" value="<?php echo $apellido2; ?>"  placeholder="Ingrese su Apellido materno" required>
                    </div>

                    <div class="form-group">
                      <label for="curp">CURP</label>
                      <input type="text"  class="form-control" name="curp" id="curp" value="<?php echo $curp; ?>" title="CURP no válida" placeholder="Digite su CURP" required
                      pattern="^[A-Z]{4}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[01])[HM][A-Z]{2}([A-Z]{3}|[A-Z]{4})([0-9]{2}|[0-9]|[0-9]{1})">
                    </div>

                    <div class="form-group">
                      <label for="genero">Género</label>
                        <select class="form-control" id="genero" value="<?php echo $genero; ?>" name="genero" required>
                            <option value="Hombre" <?php echo ($genero == 'Hombre') ? 'selected' : ''; ?>>Hombre</option>
                            <option value="Mujer" <?php echo ($genero == 'Mujer') ? 'selected' : ''; ?>>Mujer</option>
                            <option value="Otro" <?php echo ($genero == 'Otro') ? 'selected' : ''; ?>>Otro</option>
                        </select>
                    </div>
                     
                    <div class="form-group">
                        <label for="fechanac">Fecha de nacimiento</label>
                        <input type="date"  class="form-control" id="fechanac" value="<?php echo $fechanac; ?>" name="fechanac" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="discapacidad">Discapacidad</label>
                          <select class="form-control" id="discapacidad" name="discapacidad" required onchange="mostrarOtroCampo('discapacidad', 'otroDiscapacidad')">
                            <option value="Auditiva" <?php echo ($discapacidad == 'Auditiva') ? 'selected' : ''; ?>>Auditiva</option>
                            <option value="Motriz (Silla de ruedas)" <?php echo ($discapacidad == 'Motriz (Silla de ruedas)') ? 'selected' : ''; ?>>Motriz (Silla de ruedas)</option>
                            <option value="Motriz (Muletas)" <?php echo ($discapacidad == 'Motriz (Muletas)') ? 'selected' : ''; ?>>Motriz (Muletas)</option>
                            <option value="Motriz (Bastón)" <?php echo ($discapacidad == 'Motriz (Bastón)') ? 'selected' : ''; ?>>Motriz (Bastón)</option>
                            <option value="Visual" <?php echo ($discapacidad == 'Visual') ? 'selected' : ''; ?>>Visual</option>
                            <option value="Otro" <?php echo ($discapacidad == 'Otro') ? 'selected' : ''; ?>>Otro</option>
                            <option value="Ninguna" <?php echo ($discapacidad == 'Ninguna') ? 'selected' : ''; ?>>Ninguna</option>
                          </select>
                    </div>

                    <!-- Opcion "otro" al escogerla en discapacidad -->

                    <div id="otroDiscapacidad" class="form-group mb-3" <?php echo ($mostrarOtro2) ? '' : 'style="display: none;"'; ?>>
                        <label for="otroDiscapacidad">Especificar otra discapacidad:</label>
                        <input type="text" class="form-control" id="otroDiscapacidad" name="otroDiscapacidad" value="<?php echo $otroDiscapacidad; ?>">
                    </div>
                    </div>
                    

                     <!-- Datos Contacto -->

                     <div class="col-md-4 text-center card-body column">
        <h2>Datos Contacto</h2>

                    <div class="form-group">
                      <label for="calle">Calle:</label>
                      <input class="form-control" type="text" name="calle" id="calle" value="<?php echo $calle; ?>" placeholder="Ingrese su Calle" required>
                    </div>
                    
                    <div class="form-group">  
                      <label for="Num">Número #:</label>
                      <input  class="form-control" type="number" name="Num" id="Num" value="<?php echo $Num; ?>" placeholder="Ingrese su Numero de calle" required>
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="Colonia">Colonia:</label>
                      <input  class="form-control" type="text" name="Colonia" id="Colonia" value="<?php echo $Colonia; ?>" placeholder="Ingrese su Colonia" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="CP">Código postal:</label>
                      <input  class="form-control" type="number" name="CP" id="CP" value="<?php echo $CP; ?>" max="99999" min="00001"  placeholder="Digite su C.P" required>
                    </div>

                    
                    <div class="form-group">
    <label for="edop">Estado de procedencia</label>
    <select class="form-control" id="edop" name="edop" required>
        <?php
        // Itera sobre los estados
        foreach ($municipiosPorEstado as $estado => $municipios) {
            $selected = ($edop == $estado) ? 'selected' : '';
            echo "<option value=\"$estado\" $selected>$estado</option>";
        }
        ?>
    </select>
</div>

<div class="form-group">
    <label for="municipio">Municipio</label>
    <select class="form-control" id="municipio" name="municipio" required>
        <?php
        // Verifica si se seleccionó un estado
        if (!empty($edop) && isset($municipiosPorEstado[$edop])) {
            // Itera sobre los municipios del estado seleccionado
            foreach ($municipiosPorEstado[$edop] as $municipioOption) {
                $selected = ($municipio == $municipioOption) ? 'selected' : '';
                echo "<option value=\"$municipioOption\" $selected>$municipioOption</option>";
            }
        }
        ?>
    </select>
</div>

<?php
// Almacenar el valor del municipio en la sesión
$_SESSION['municipio'] = $municipio;
?>


                    

                  
                    <div class="form-group">
                      <label for="telefono">Teléfono o celular</label>
                      <input class="form-control" type="tel" name="telefono" id="telefono" value="<?php echo $telefono; ?>" placeholder="Ingrese su No.Telefono" required >
                    </div>

                    <div class="form-group">
                      <label for="Correo">Correo electrónico:</label>
                      <input class="form-control" type="email" name="Correo" id="Correo" value="<?php echo $correo; ?>" placeholder="ejemplo@correo.com" required>
                    </div>
</div>

                     <!-- Datos Procedencia -->

                     <div class="col-md-4 text-center card-body column">
                        <h2>Datos Procedencia</h2>
                    
                    <div class="form-group">
                      <label for="Boleta">Número de Boleta</label>
                      <input class="form-control" type="number" name="boleta" id="boleta" value="<?php echo $boleta; ?>"  maxlength="10" minlength="10" placeholder="Ingrese su No.Boleta" required>
                    </div>

                    <div id="Promedio" class="form-group mb-3">
                        <label for="Promedio">Ingresa tu promedio</label>
                        <input type="number" class="form-control" id="Promedio" name="Promedio" value="<?php echo $Promedio; ?>" placeholder="Ingrese su Promedio" required>
                    </div>

                    <div class="form-group mb-3">
                      <label for="escuelas">Escuela de procedencia:</label>
                          <select class="form-control" id="escuelas" name="escuelas" required onchange="mostrarOtroCampo('escuelas', 'otroEscuela')">
                            <option value="CECyT 1 -González Vázquez Vega-" <?php echo ($escuelas == 'CECyT 1 -González Vázquez Vega-') ? 'selected' : ''; ?>>CECyT 1 “González Vázquez Vega”</option>
                            <option value="CECyT 2 -Miguel Bernard-" <?php echo ($escuelas == 'CECyT 2 -Miguel Bernard-') ? 'selected' : ''; ?>>CECyT 2 "Miguel Bernard"</option>
                            <option value="CECyT 3 -Estanislao Ramírez Ruiz-" <?php echo ($escuelas == 'CECyT 3 -Estanislao Ramírez Ruiz-') ? 'selected' : ''; ?>>CECyT 3 "Estanislao Ramírez Ruiz"</option>
                            <option value="CECyT 4 -Lázaro Cárdenas-" <?php echo ($escuelas == 'CECyT 4 -Lázaro Cárdenas-') ? 'selected' : ''; ?>>CECyT 4 "Lázaro Cárdenas"</option>
                            <option value="CECyT 5 -Benito Juárez García-" <?php echo ($escuelas == 'CECyT 5 -Benito Juárez García-') ? 'selected' : ''; ?>>CECyT 5 "Benito Juárez García"</option>
                            <option value="CECyT 6 -Miguel Othón de Mendizábal-" <?php echo ($escuelas == 'CECyT 6 -Miguel Othón de Mendizábal-') ? 'selected' : ''; ?>>CECyT 6 "Miguel Othón de Mendizábal"</option>
                            <option value="CECyT 7 -Cuauhtémoc-" <?php echo ($escuelas == 'CECyT 7 -Cuauhtémoc-') ? 'selected' : ''; ?>>CECyT 7 "Cuauhtémoc"</option>
                            <option value="CECyT 8 -Narciso Bassols García-" <?php echo ($escuelas == 'CECyT 8 -Narciso Bassols García-') ? 'selected' : ''; ?>>CECyT 8 "Narciso Bassols García"</option>
                            <option value="CECyT 9 -Juan de Dios Bátiz-" <?php echo ($escuelas == 'CECyT 9 -Juan de Dios Bátiz-') ? 'selected' : ''; ?>>CECyT 9 "Juan de Dios Bátiz"</option>
                            <option value="CECyT 10 -Carlos Vallejo Márquez-" <?php echo ($escuelas == 'CECyT 10 -Carlos Vallejo Márquez-') ? 'selected' : ''; ?>>CECyT 10 "Carlos Vallejo Márquez"</option>
                            <option value="CECyT 11 -Wilfrido Massieu Pérez-" <?php echo ($escuelas == 'CECyT 11 -Wilfrido Massieu Pérez-') ? 'selected' : ''; ?>>CECyT 11 "Wilfrido Massieu Pérez"</option>
                            <option value="CECyT 12 -José María Morelos y Pavón-" <?php echo ($escuelas == 'CECyT 12 -José María Morelos y Pavón-') ? 'selected' : ''; ?>>CECyT 12 "José María Morelos y Pavón"</option>
                            <option value="CECyT 13 -Ricardo Flores Magón-" <?php echo ($escuelas == 'CECyT 13 -Ricardo Flores Magón-') ? 'selected' : ''; ?>>CECyT 13 "Ricardo Flores Magón"</option>
                            <option value="CECyT 14 -Luis Enrique Erro-" <?php echo ($escuelas == 'CECyT 14 -Luis Enrique Erro-') ? 'selected' : ''; ?>>CECyT 14 "Luis Enrique Erro"</option>
                            <option value="CECyT 15 -Diódoro Antúnez Echegaray-" <?php echo ($escuelas == 'CECyT 15 -Diódoro Antúnez Echegaray-') ? 'selected' : ''; ?>>CECyT 15 "Diódoro Antúnez Echegaray"</option>
                            <option value="CECyT 19 -Leona Vicario" <?php echo ($escuelas == 'CECyT 19 -Leona Vicario') ? 'selected' : ''; ?>>CECyT 19 “Leona Vicario”</option>
                            <option value="CET 1 -Walter Cross Buchanan-" <?php echo ($escuelas == 'CET 1 -Walter Cross Buchanan-') ? 'selected' : ''; ?>>CET 1 “Walter Cross Buchanan”</option>
                            <option value="Otro" <?php echo ($escuelas == 'Otro') ? 'selected' : ''; ?>>Otro</option>
                        </select>
                    </div>

                    <!-- Opcion "otro" al escogerla en escuelas -->
                    <div id="otroEscuela" class="form-group mb-3" <?php echo ($mostrarOtro1) ? '' : 'style="display: none;"'; ?>>
                      <label for="otroEscuela">Especificar otra escuela:</label>
                      <input type="text" class="form-control" id="otroEscuela" name="otroEscuela" value="<?php echo $otroEscuela; ?>">
                    </div>
                  
                </div>
              </div>

          
              <div class="card-footer text-center mt-4">
                <button type="submit" class="btn btn-guinda btn-lg">Guardar cambios</button> 
              </div>

            </form>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

    </section>


                       
</body>

</html>