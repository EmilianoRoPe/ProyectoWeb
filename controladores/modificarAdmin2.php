<?php
// Incluir el archivo de conexión
include('conexion.php');

// Asegúrate de validar y sanitizar la entrada del usuario para evitar SQL injection
$curp = $_GET['curp']; // Supongo que curp es un parámetro pasado en la URL

// Consulta SQL para obtener los datos del administrador
$query = "SELECT * FROM persona WHERE curp = '$curp'";
$result = $conexion->query($query);



if ($result && $row = $result->fetch_assoc()) {
    // Mostrar datos del usuario en el formulario

    // Agregar lógica para manejar el envío del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos actualizados del formulario
        $nombre = $conexion->real_escape_string($_POST['nombre']);
    $apellido1 = $conexion->real_escape_string($_POST['apellido1']);
    $apellido2 = $conexion->real_escape_string($_POST['apellido2']);
    $curp = $conexion->real_escape_string($_POST['curp']);
    $genero = $conexion->real_escape_string($_POST['genero']);
    $fechanac = $conexion->real_escape_string($_POST['fechanac']);
    $discapacidad = $conexion->real_escape_string($_POST['discapacidad']);
    $otraDiscapacidad = $conexion->real_escape_string($_POST['otroDiscapacidad']);
    $calle = $conexion->real_escape_string($_POST['calle']);
    $Num = $conexion->real_escape_string($_POST['Num']);
    $Colonia = $conexion->real_escape_string($_POST['Colonia']);
    $CP = $conexion->real_escape_string($_POST['CP']);
    $edop = $conexion->real_escape_string($_POST['edop']);
    $municipios = $conexion->real_escape_string($_POST['municipios']);
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $Correo = $conexion->real_escape_string($_POST['Correo']);
    $boleta = $conexion->real_escape_string($_POST['boleta']);
    $Promedio = $conexion->real_escape_string($_POST['Promedio']);
    $escuelas = $conexion->real_escape_string($_POST['escuelas']);
    $otroEscuela = $conexion->real_escape_string($_POST['otroEscuela']);
    
    // Actualizar los datos en la base de datos
    $update_query = "UPDATE persona SET 
    nombre = '$nombre', 
    apellido1 = '$apellido1', 
    apellido2 = '$apellido2', 
    curp = '$curp', 
    genero = '$genero', 
    fechanac = '$fechanac', 
    discapacidad = '$discapacidad', 
    otraDiscapacidad = '$otraDiscapacidad', 
    calle = '$calle', 
    Num = '$Num', 
    Colonia = '$Colonia', 
    CP = '$CP', 
    edop = '$edop', 
    municipios = '$municipios', 
    telefono = '$telefono', 
    Correo = '$Correo', 
    boleta = '$boleta', 
    Promedio = '$Promedio', 
    escuelas = '$escuelas', 
    otroEscuela = '$otroEscuela' 
    WHERE curp = '$curp'";
    
    if ($conexion->query($update_query) === TRUE) {
        echo "<p>Datos actualizados correctamente.</p>";
    } else {
        echo "<p>Error al actualizar datos: " . $conexion->error . "</p>";
    }
    }
    // Resto de tu código...
    ?>


  

<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/estilosindex.css">
  <script src="../js/jquery-3.7.1.min.js"></script>

  <link rel="stylesheet" href="../css/estilos.css">

  <title>Formulario</title>
</head>
<body>
   


    <!-- Formulario. -->

    <section class="content">
      <div class="container extended-form mx-auto">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="card bg-#800000 text-center text-white"> <h3>Formulario de registro.</h3></div>
            <form action="procesarAdmin2.php" class="formula" method="post" id="formula" onsubmit="return ValidarFormula()">
              <div class="card-body">
                <div class="row">
                  
                    <hr style="color:#800000">

                     <!-- Datos Identidad -->

                     <div class="col-md-4 text-center card-body column">
                        <h2>Datos Identidad</h2>

                        <div class="form-group mb-3" id="group_nombre">
                      <label for="nombre" class="form_label">Nombre(s):</label>
                      <div class="formulario_group-input">
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su Nombre(s)" value="<?php echo $row['nombre']; ?>" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Nombre(s) debe empezar con la primera letra mayúscula, como mínimo 3 dígitos.</p>
                    </div>

                    <div class="form-group mb-3" id="group_apellido1">
                      <label for="apellido1" class="form_label">Apellido paterno:</label>
                      <div class="formulario_group-input">
                      <input type="text" class="form-control" name="apellido1" id="apellido1" placeholder="Ingrese su Apellido paterno" value="<?php echo $row['apellido1']; ?>" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Favor de ingresar su apellido correctamente, primera letra en mayúscula.</p>
                    </div>
                    
                    <div class="form-group mb-3" id="group_apellido2">
                      <label for="apellido2" class="form_label">Apellido materno:</label>
                      <div class="formulario_group-input">
                      <input type="text" class="form-control" name="apellido2" id="apellido2" placeholder="Ingrese su Apellido materno" value="<?php echo $row['apellido2']; ?>" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Favor de ingresar su apellido correctamente, primera letra en mayúscula.</p>
                    </div>

                    <div class="form-group mb-3" id="group_curp">
                      <label for="curp" class="form_label">CURP:</label>
                      <div class="formulario_group-input">
                      <input type="text" class="form-control" name="curp" id="curp" title="CURP no válida" placeholder="Digite su CURP" value="<?php echo $row['curp']; ?>" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Coloque correctamente su CURP.</p>
                    </div>

                    <div class="form-group mb-3" id="group_genero">
                    <label for="genero">Género:</label>
                    <select class="form-control" id="genero" name="genero" required>
                        <option value="Hombre" <?php echo ($row['genero'] == 'Hombre') ? 'selected' : ''; ?>>Hombre</option>
                        <option value="Mujer" <?php echo ($row['genero'] == 'Mujer') ? 'selected' : ''; ?>>Mujer</option>
                        <option value="Otro" <?php echo ($row['genero'] == 'Otro') ? 'selected' : ''; ?>>Otro</option>
                    </select>
                    </div>
                     
                    <div class="form-group mb-3" id="group_fechanac">
                    <label for="fechanac" class="form_label">Fecha de nacimiento:</label>
                    <div class="formulario_group-input">
                        <input type="date" class="form-control" id="fechanac" name="fechanac" value="<?php echo $row['fechanac']; ?>" required>
                    </div>
                    <p class="formulario_input-error">Coloque correctamente la fecha de nacimiento, año válido de 1990 a 2009.</p>
                    </div>

                    <div class="form-group mb-3">
                    <label for="discapacidad">Discapacidad</label>
                    <select class="form-control" id="discapacidad" name="discapacidad" required>
                        <option value="">Seleccione</option>
                        <?php
                        $opciones_discapacidad = array("Auditiva", "Motriz (Silla de ruedas)", "Motriz (Muletas)", "Motriz (Bastón)", "Visual", "Otro", "Ninguna");

                        foreach ($opciones_discapacidad as $opcion) {
                            $selected = ($row['discapacidad'] == $opcion) ? "selected" : "";
                            echo "<option value=\"$opcion\" $selected>$opcion</option>";
                        }
                        ?>
                    </select>
                </div>

                    <!-- Opcion "otro" al escogerla en discapacidad -->

                    <div id="otroDiscapacidad_group" class="form-group mb-3">
                        <label for="otroDiscapacidad">Especificar otra discapacidad:</label>
                        <?php
                        // Mostrar el campo de texto solo si la opción almacenada es "Otro"
                        $display_otro = ($row['discapacidad'] == 'Otro') ? 'block' : 'none';
                        ?>
                        <input type="text" class="form-control" id="otroDiscapacidad" name="otroDiscapacidad" style="display: <?= $display_otro; ?>">
                    </div>
                     </div>
                     

                    <!-- Datos Contacto -->

                    <div class="col-md-4 text-center card-body column">
                      <h2>Datos Contacto</h2>

                    <div class="form-group mb-3">
                      <label for="calle">Calle:</label>
                      <input class="form-control" type="text" name="calle" id="calle" placeholder="Ingrese su Calle" value="<?php echo htmlspecialchars($row['calle']); ?>" required>
                    </div>
                    
                    <div class="form-group mb-3" id="group_Num">  
                      <label for="Num" class="form_label">Número #:</label>
                      <div class="formulario_group-input">
                      <input class="form-control" type="number" name="Num" id="Num" placeholder="Ingrese su Número de calle" value="<?php echo htmlspecialchars($row['Num']); ?>" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Coloque solo el número del 1-99.</p>
                    </div> 
                    
                    <div class="form-group mb-3">
                      <label for="Colonia">Colonia:</label>
                      <input class="form-control" type="text" name="Colonia" id="Colonia" placeholder="Ingrese su Colonia" value="<?php echo htmlspecialchars($row['Colonia']); ?>" required>
                    </div>
                    
                    <div class="form-group mb-3" id="group_CP">
                      <label for="CP" class="form_label">Código postal:</label>
                      <div class="formulario_group-input">
                      <input class="form-control" type="number" name="CP" id="CP" max="99999" min="00001" placeholder="Coloque su C.P" value="<?php echo htmlspecialchars($row['CP']); ?>" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">El código postal es solo 5 dígitos númericos.</p>
                    </div>

                    <div class="form-group mb-3">
    <label for="edop">Seleccione su estado de residencia</label>
    <select class="form-select" aria-label="Default select example" id="edop" name="edop" onchange="cargarMunicipios()" required>
        <option value="">Seleccione</option>
        <?php
        $estados = array("Aguascalientes", "Baja California", "Baja California Sur", "Campeche", "Chiapas", "Chihuahua", "Ciudad de México", "Coahuila", "Colima", "Durango", "Estado de México", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco", "Michoacán", "Morelos", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", "Querétaro",
            "Quintana Roo", "San Luis Potosí", "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatán", "Zacatecas");
        foreach ($estados as $estado) {
            $selected = ($row['edop'] == $estado) ? "selected" : "";
            echo "<option value=\"$estado\" $selected>$estado</option>";
        }
        ?>
    </select>
</div>

<!-- Agrega este bloque para el select de municipios -->
<div class="form-group mb-3">
    <label for="municipios">Seleccione su municipio</label>
    <select class="form-select" id="municipios" name="municipios" required>
        <option value="">Seleccione</option>
    </select>
</div>


                    <div class="form-group" id="group_telefono">
                      <label for="telefono" class="form_label">Teléfono o celular</label>
                      <div class="formulario_group-input">
                        <input class="form-control" type="tel" name="telefono" id="telefono" placeholder="Ingrese su No.Teléfono" value="<?php echo htmlspecialchars($row['telefono']); ?>" required> 
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Solo se deben ingresar 10 dígitos númericos.</p>
                    </div>

                    <div class="form-group" id="group_correo"> <!--Ambas son Correo-->
                      <label for="Correo" class="form_label">Correo electrónico:</label>
                      <div class="formulario_group-input">
                        <input class="form-control" type="email" name="Correo" id="Correo" placeholder="ejemplo@correo.com" value="<?php echo htmlspecialchars($row['Correo']); ?>" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Coloque correctamente su correo.</p>
                    </div>

                    </div>

                     <!-- Datos Procedencia -->

                     <div class="col-md-4 text-center card-body column">
                        <h2>Datos Procedencia</h2>
                    
                        <div class="form-group mb-3" id="group_boleta">
                      <label for="boleta" class="form_label">Número de Boleta:</label>
                      <div class="formulario_group-input">
                        <input class="form-control" type="text" name="boleta" id="boleta" title="Boleta no valida "placeholder="Ingrese su No.Boleta" value="<?php echo htmlspecialchars($row['boleta']); ?>" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                      <p class="formulario_input-error">La boleta es máximo de 10 dígitos, empezando con números o PE,PP.</p>
                    </div>

                    <div class="form-group mb-3" id="group_Promedio">
                        <label for="Promedio" class="form_label">Ingresa tu promedio:</label>
                        <div class="formulario_group-input">
                          <input type="number" step="0.01" class="form-control" id="Promedio" name="Promedio" placeholder="Ingrese su Promedio" value="<?php echo htmlspecialchars($row['Promedio']); ?>" required>
                          <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario_input-error">Ingresa solo números con hasta 2 decimales.</p>
                    </div>

                    <div class="form-group mb-3">
    <label for="escuela">Escuela</label>
    <select class="form-control" id="escuelas" name="escuelas" required>
        <option value="">Seleccione</option>
        <?php
        // Opciones para el campo "escuela"
        $opciones_escuela = array("CECyT 1 -González Vázquez Vega-", "CECyT 2 -Miguel Bernard-", "CECyT 3 -Estanislao Ramírez Ruiz-", "CECyT 4 -Lázaro Cárdenas-","CECyT 5 -Benito Juárez García-","CECyT 6 -Miguel Othón de Mendizábal-","CECyT 7 -Cuauhtémoc-",
        "CECyT 8 -Narciso Bassols García-","CECyT 9 -Juan de Dios Bátiz-","CECyT 10 -Carlos Vallejo Márquez-","CECyT 11 -Wilfrido Massieu Pérez-","CECyT 12 -José María Morelos y Pavón-","CECyT 13 -Ricardo Flores Magón-","CECyT 14 -Luis Enrique Erro-","CECyT 15 -Diódoro Antúnez Echegaray-",
        "CECyT 19 -Leona Vicario","CET 1 -Walter Cross Buchanan-","Otro");

        // Iterar sobre las opciones y mostrarlas en el select
        foreach ($opciones_escuela as $opcion) {
            $selected = ($row['escuelas'] == $opcion) ? "selected" : "";
            echo "<option value=\"$opcion\" $selected>$opcion</option>";
        }
        ?>
    </select>
</div>

<div id="otroEscuela_group" class="form-group mb-3">
                        <label for="otroEscuela">Especificar otra escuela:</label>
                        <?php
                        // Mostrar el campo de texto solo si la opción almacenada es "Otro"
                        $display_otro = ($row['escuelas'] == 'Otro') ? 'block' : 'none';
                        ?>
                        <input type="text" class="form-control" id="otroEscuela" name="otroEscuela" style="display: <?= $display_otro; ?>">
                    </div>

                    
              </div>
              
              <div class="form_mensaje" id="form_mensaje">
                <p><i class="fa-solid fa-file-circle-exclamation"></i><b>Error:</b> Por favor, conteste el formulario de manera correcta.</p>
              </div>
              
              <div class="card-footer text-center mt-4">
                <button type="submit" class="btn btn-guinda btn-lg" value="Enviar">Actualizar</button> 
            
              </div>

            </form>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

    </section>

    <script src="../js/validacionDis.js"></script>
    <!--<script scr="js/ValModi.js"></script>-->
    <script src="../js/funcionesMun.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d7553eefe6.js" crossorigin="anonymous"></script>           
</body>

</html>
  
<?php
} else {
    echo "<p>No se encontraron datos para la CURP proporcionada.</p>";
}

// Cierra la conexión a la base de datos
$conexion->close();
?>