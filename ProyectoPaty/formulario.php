<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilosindex.css">
  <script src="js/jquery-3.7.1.min.js"></script>

  <link rel="stylesheet" href="css/estilos.css">

  <title>Formulario</title>
</head>
<body>
    <!-- Barra de navegación -->

    <nav class="principa">
    <ul class="nav">
      <li>
        <img src="img/pleca-gob.png" alt="Logo_gobierno" width="450px">
      </li>
      <li class="nav-item" class="opcion  ">
        <a class="nav-link active" aria-current="page" href="https://www.ipn.mx/directorio-telefonico.html">Directorio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.ipn.mx/correo-electronico.html">Correo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.ipn.mx/calendario-academico.html">Calendario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.ipn.mx/buzon.html">Buzón</a>
      </li>
    </ul>
    </nav>
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
                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="formulario.php">Formulario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="controladores/administrador.php">Administrador</a>
              </li>
          <a class="navbar-brand" href="index.php">
                <img src="img/escomlogo.png" alt="LogoIpn" style="width: 60px;">
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
            <div class="card bg-#800000 text-center text-white"> <h3>Formulario de registro.</h3></div>
            <form action="../ProyectoPaty/controladores/procesar.php" class="formula" method="post" id="formula" onsubmit="return ValidarFormula()">
              <div class="card-body">
                <div class="row">
                  
                    <hr style="color:#800000">

                     <!-- Datos Identidad -->

                     <div class="col-md-4 text-center card-body column">
                        <h2>Datos Identidad</h2>

                    <div class="form-group mb-3" id="group_nombre">
                      <label for="nombre" class="form_label">Nombre(s):</label>
                      <div class="formulario_group-input">
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su Nombre(s)" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Nombre(s) debe empezar con la primera letra mayúscula, como minimo 3 digitos.</p>
                    </div>

                    <div class="form-group mb-3" id="group_apellido1">
                      <label for="apellido1" class="form_label">Apellido paterno:</label>
                      <div class="formulario_group-input">
                        <input type="text" class="form-control" name="apellido1" id="apellido1"  placeholder="Ingrese su Apellido paterno" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Favor de ingresar su apellido correctamente, primera letra en mayúscula.</p>
                    </div>
                    
                    <div class="form-group mb-3" id="group_apellido2">
                      <label for="apellido2" class="form_label">Apellido materno:</label>
                      <div class="formulario_group-input">
                        <input type="text"  class="form-control" name="apellido2" id="apellido2"  placeholder="Ingrese su Apellido materno" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Favor de ingresar su apellido correctamente, primera letra en mayúscula.</p>
                    </div>

                    <div class="form-group mb-3" id="group_curp">
                      <label for="curp" class="form_label">CURP:</label>
                      <div class="formulario_group-input">
                      <input type="text" class="form-control" name="curp" id="curp" title="CURP no válida" placeholder="Digite su CURP" required
                        pattern="^[A-Z]{4}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[01])[HM][A-Z]{2}([A-Z]{3}|[A-Z]{4})([0-9]{2}|[0-9]|[0-9]{1})">
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Coloque correctamente su CURP.</p>
                    </div>

                    <div class="form-group mb-3"> <!--Aqui cambio de género a genero-->
                      <label for="edop">Género:</label>
                        <select class="form-control" id="genero" name="genero" required>
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                     
                    <div class="form-group mb-3" id="group_fechanac">
                        <label for="fechanac" class="form_label">Fecha de nacimiento:</label>
                        <div class="formulario_group-input">
                          <input type="date"  class="form-control" id="fechanac" name="fechanac" required>
                          
                        </div>
                          <p class="formulario_input-error">Coloque correctamente la fecha de nacimiento, año valido de 1990 a 2009.</p>
                    </div>

                    <div class="form-group mb-3">
                      <label for="discapacidad">Discapacidad</label>
                      <select class="form-control" id="discapacidad" name="discapacidad" required>
                            <option value="">Seleccione</option>
                            <option value="Auditiva">Auditiva</option>
                            <option value="Motriz (Silla de ruedas)">Motriz (Silla de ruedas)</option>
                            <option value="Motriz (Muletas)">Motriz (Muletas)</option>
                            <option value="Motriz (Bastón)">Motriz (Bastón)</option>
                            <option value="Visual">Visual</option>
                            <option value="Otro">Otra</option>
                            <option value="Ninguna">Ninguna</option>
                          </select>
                     </div>

                    <!-- Opcion "otro" al escogerla en discapacidad -->

                    <div id="otroDiscapacidad_group" class="form-group mb-3">
                        <label for="otroDiscapacidad">Especificar otra discapacidad:</label>
                        <input type="text" class="form-control" id="otroDiscapacidad" name="otroDiscapacidad">
                    </div>

                     </div>
                     

                    <!-- Datos Contacto -->

                    <div class="col-md-4 text-center card-body column">
                      <h2>Datos Contacto</h2>

                    <div class="form-group mb-3">
                      <label for="calle">Calle:</label>
                      <input class="form-control" type="text" name="calle" id="calle" placeholder="Ingrese su Calle" required>
                    </div>
                    
                    <div class="form-group mb-3" id="group_Num">  
                      <label for="Num" class="form_label">Número #:</label>
                      <div class="formulario_group-input">
                        <input  class="form-control" type="number" name="Num" id="Num" placeholder="Ingrese su Numero de calle" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Coloque solo el número del 1-99.</p>
                    </div>   
                    
                    <div class="form-group mb-3">
                      <label for="Colonia">Colonia:</label>
                      <input  class="form-control" type="text" name="Colonia" id="Colonia" placeholder="Ingrese su Colonia" required>
                    </div>
                    
                    <div class="form-group mb-3" id="group_CP">
                      <label for="CP" class="form_label">Código postal:</label>
                      <div class="formulario_group-input">
                        <input  class="form-control" type="number" name="CP" id="CP" max="99999" min="00001"  placeholder="Digite su C.P" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">El codigo postal es solo 5 digitos númericos.</p>
                    </div>

                    <div class="form-group mb-3">
                      <label for="edop">Seleccione su estado de residencia</label>
                        <select class="form-select" aria-label="Default select example" id="edop" name="edop" onchange="cargarMunicipios()" required>
                          <option value="">Seleccione</option>  
                          <option value="Aguascalientes">Aguascalientes</option>
                          <option value="Baja California">Baja California</option>
                          <option value="Baja California Sur">Baja California Sur</option>
                          <option value="Campeche">Campeche</option>
                          <option value="Chiapas">Chiapas</option>
                          <option value="Chihuahua">Chihuahua</option>
                          <option value="Ciudad de México">Ciudad de México</option>
                          <option value="Coahuila">Coahuila</option>
                          <option value="Colima">Colima</option>
                          <option value="Durango">Durango</option>
                          <option value="Estado de México">Estado de México</option>
                          <option value="Guanajuato">Guanajuato</option>
                          <option value="Guerrero">Guerrero</option>
                          <option value="Hidalgo">Hidalgo</option>
                          <option value="Jalisco">Jalisco</option>
                          <option value="Michoacán">Michoacán</option>
                          <option value="Morelos">Morelos</option>
                          <option value="Nayarit">Nayarit</option>
                          <option value="Nuevo León">Nuevo León</option>
                          <option value="Oaxaca">Oaxaca</option>
                          <option value="Puebla">Puebla</option>
                          <option value="Querétaro">Querétaro</option>
                          <option value="Quintana Roo">Quintana Roo</option>
                          <option value="San Luis Potosí">San Luis Potosí</option>
                          <option value="Sinaloa">Sinaloa</option>
                          <option value="Sonora">Sonora</option>
                          <option value="Tabasco">Tabasco</option>
                          <option value="Tamaulipas">Tamaulipas</option>
                          <option value="Tlaxcala">Tlaxcala</option>
                          <option value="Veracruz">Veracruz</option>
                          <option value="Yucatán">Yucatán</option>
                          <option value="Zacatecas">Zacatecas</option>
                          </select>
                          <label for="municipios">Selecciona un municipio:</label>
                          <select class="form-select" aria-label="Default select example" id="municipios">
                            <option value="">Seleccionar municipio</option>
                        </select>
                    </div>

                    <div class="form-group" id="group_telefono">
                      <label for="telefono" class="form_label">Teléfono o celular</label>
                      <div class="formulario_group-input">
                        <input class="form-control" type="tel" name="telefono" id="telefono" placeholder="Ingrese su No.Telefono" required >
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Solo se deben ingresar 10 digitos númericos.</p>
                    </div>

                    <div class="form-group" id="group_correo"> <!--Ambas son Correo-->
                      <label for="Correo" class="form_label">Correo electrónico:</label>
                      <div class="formulario_group-input">
                        <input class="form-control" type="email" name="Correo" id="Correo" placeholder="ejemplo@correo.com" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                        <p class="formulario_input-error">Coloque correctamente su correo.</p>
                    </div>

                    </div>

                     <!-- Datos Procedencia -->

                     <div class="col-md-4 text-center card-body column">
                        <h2>Datos Procedencia</h2>
                    
                    <div class="form-group mb-3" id="group_boleta">
                      <label for="Boleta" class="form_label">Número de Boleta:</label>
                      <div class="formulario_group-input">
                        <input class="form-control" type="text" name="boleta" id="boleta" title="Boleta no valida "placeholder="Ingrese su No.Boleta" required>
                        <i class="formulario_validacion-estado fa-solid fa-circle-xmark"></i>
                      </div>
                      <p class="formulario_input-error">La boleta es maximo de 10 digitos, empezando con numeros o PE,PP.</p>
                    </div>

                    <div id="Promedio" class="form-group mb-3">
                        <label for="Promedio">Ingresa tu promedio</label>
                        <input type="number" class="form-control" id="Promedio" name="Promedio" placeholder="Ingrese su Promedio" required>
                    </div>

                    <div class="form-group mb-3">
                      <label for="escuelas">Escuela de procedencia:</label>
                      <select class="form-control" id="escuelas" name="escuelas" required>
                            <option value="">Seleccione</option>
                            <option value="CECyT 1 -González Vázquez Vega-">CECyT 1 “González Vázquez Vega”</option>
                            <option value="CECyT 2 -Miguel Bernard-">CECyT 2 "Miguel Bernard"</option>
                            <option value="CECyT 3 -Estanislao Ramírez Ruiz-">CECyT 3 "Estanislao Ramírez Ruiz"</option>
                            <option value="CECyT 4 -Lázaro Cárdenas-">CECyT 4 "Lázaro Cárdenas"</option>
                            <option value="CECyT 5 -Benito Juárez García-">CECyT 5 "Benito Juárez García"</option>
                            <option value="CECyT 6 -Miguel Othón de Mendizábal-">CECyT 6 "Miguel Othón de Mendizábal"</option>
                            <option value="CECyT 7 -Cuauhtémoc-"> CECyT 7 "Cuauhtémoc"</option>
                            <option value="CECyT 8 -Narciso Bassols García-">CECyT 8 "Narciso Bassols García"</option>
                            <option value="CECyT 9 -Juan de Dios Bátiz-">CECyT 9 "Juan de Dios Bátiz"</option>
                            <option value="CECyT 10 -Carlos Vallejo Márquez-">CECyT 10 "Carlos Vallejo Márquez"</option>
                            <option value="CECyT 11 -Wilfrido Massieu Pérez-">CECyT 11 "Wilfrido Massieu Pérez"</option>
                            <option value="CECyT 12 -José María Morelos y Pavón-">CECyT 12 "José María Morelos y Pavón"</option>
                            <option value="CECyT 13 -Ricardo Flores Magón-"> CECyT 13 "Ricardo Flores Magón"</option>
                            <option value="CECyT 14 -Luis Enrique Erro-">CECyT 14 "Luis Enrique Erro"</option>
                            <option value="CECyT 15 -Diódoro Antúnez Echegaray-">CECyT 15 "Diódoro Antúnez Echegaray"</option>
                            <option value="CECyT 19 -Leona Vicario">CECyT 19 “Leona Vicario”</option> 
                            <option value="CET 1 -Walter Cross Buchanan-">CET 1 “Walter Cross Buchanan”</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>

                    <!-- Opcion "otro" al escogerla en escuelas -->

                    <div id="otroEscuela_group" class="form-group mb-3">
                        <label for="otroEscuela">Especificar otra escuela:</label>
                        <input type="text" class="form-control" id="otroEscuela" name="otroEscuela">
                    </div>
                      <input type="hidden" name="resetForm" value="1">
                  
                </div>
              </div>
              
              <div class="form_mensaje" id="form_mensaje">
                <p><i class="fa-solid fa-file-circle-exclamation"></i><b>Error:</b> Por favor, conteste el formulario de manera correcta.</p>
              </div>
              
              <div class="card-footer text-center mt-4">
                <button type="submit" class="btn btn-guinda btn-lg" value="Enviar">Registrar</button> 
                <input type="button" class="btn btn-guinda btn-lg" value="Limpiar" onclick="limpiarFormula()">
              </div>

            </form>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

    </section>

    <script src="js/validacionDis.js"></script>
    <!--<script scr="js/ValModi.js"></script>-->
    <script src="js/funcionesMun.js"></script>
    <script src="js/validaciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d7553eefe6.js" crossorigin="anonymous"></script>           
</body>
<footer>
<div class="bg-secondary">
        <div class="container-fluid">
          <div class="row p-5">
            <div class="col-xs-12 col-md-6 col-lg-12 fw-semibold">
              <h4 class="text-center">INSTITUTO POLITÉCNICO NACIONAL</h4>
              <p>D.R. Instituto Politécnico Nacional (IPN). Av. Luis Enrique Erro S/N, Unidad Profesional Adolfo López Mateos, Zacatenco, Alcaldía Gustavo A. Madero, C.P. 07738, Ciudad de México, 2019. Conmutador: 55 57 29 60 00 / 55 57 29 63 00.</p>
              <br>
              <p>Esta página es una obra intelectual protegida por la Ley Federal del Derecho de Autor, puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica; su uso para otros fines, requiere autorización previa y por escrito de la Dirección General del Instituto.</p>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-12">
              <img src="img/sep.png" alt="">
            </div>
          </div>
        </div>
      </div>
<!--Footer 2-->
    <div class="container-fluid">
      <div class="row p-5 personalizado text-white">
        <div class="col-xs-12 col-md-6 col-lg-3">
          <img src="img/Logo_del_Gobierno.png"  width="200px" alt="gobierno" class="logo_footer" style="max-width: 90%;">
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
          <p class="h5 mb-3">Enlaces</p>
          <div class="mb-1">
            <a class="text-white" target="_blank" href="#">Participa</a>
          </div>
          <div class="mb-1">
            <a class="text-white" target="_blank" href="https://www.gob.mx/publicaciones">Publicaciones Oficiales</a>
          </div>
          <div class="mb-1">
            <a class="text-white" target="_blank" href="">Marco Jurídico</a>
          </div>
          <div class="mb-1">
            <a class="text-white" target="_blank" href="https://consultapublicamx.plataformadetransparencia.org.mx/vut-web/">Plataforma Nacional de Transparencia</a>
          </div>
          <div class="mb-1">
            <a class="text-white" target="_blank" href="https://alertadores.funcionpublica.gob.mx/">Alerta</a>
          </div>
          <div class="mb-1">
            <a class="text-white" target="_blank" href="https://sidec.funcionpublica.gob.mx/#!/">Denuncia</a>
          </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
          <p class="h5">¿Qué es gob.mx?</p>
          <div class="mb-4">
            <p>Es el portal único de trámites, información y participación ciudadana.</p>
            <a href="https://www.gob.mx/que-es-gobmx" target="_blank" class="text-white">Leer más</a>
          </div>
          <div class="mb-1">
            <a class="text-white" target="_blank" href="https://datos.gob.mx/">Portal de datos abiertos</a>
          </div>
          <div class="mb-1">
            <a class="text-white" target="_blank" href="https://www.gob.mx/accesibilidad">Declaración de accesibilidad</a>
          </div> 
          <div class="mb-1">
            <a class="text-white" target="_blank" href="https://www.gob.mx/aviso_de_privacidad">Aviso de privacidad integral</a>
          </div> 
          <div class="mb-1">
            <a class="text-white" target="_blank" href="https://www.gob.mx/privacidadsimplificado">Aviso de privacidad simplificado</a>
          </div> 
          <div class="mb-1">
            <a class="text-white" target="_blank" href="https://www.gob.mx/terminos">Términos y Condiciones</a>
          </div> 
          <div class="mb-1">
            <a class="text-white" target="_blank" href="https://www.gob.mx/terminos#medidas-seguridad-informacion">Política de seguridad</a>
          </div> 
          <div class="mb-1">
            <a class="text-white" target="_blank" href="https://www.gob.mx/sitemap">Mapa de sitio</a>
          </div>  
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
          <a class="h5" href="https://www.gob.mx/tramites/ficha/presentacion-de-quejas-y-denuncias-en-la-sfp/SFP54" target="_blank">Denuncia contra servidores publicos.</a>
          <div>
            <h5>Siguenos en</h5>
                <a href="https://www.facebook.com/gobmexico" target="_blank" class="text-decoration-none">
                  <img src="img/facebook.png" alt="facebook" width="50px">
                </a>

                <a href="https://twitter.com/GobiernoMX" target="_blank" class="text-decoration-none">
                  <img src="img/twitter.png" alt="x" width="50px">
                </a>

          </div>
        </div>

      </div>

    </div>

</footer>
</html>
  