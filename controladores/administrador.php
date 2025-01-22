
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Iniciar sesión como Administrador</title>
  <link rel="stylesheet" href="../css/estiloadmin.css">
  <link rel="stylesheet" href="../css/estilosindex.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
  <link rel="shortcut icon" href="../img/administrador.png">
</head>
<body>

 <!-- Cabecera -->
 <nav class="principal">
    <ul class="nav">
      <li class="nav-logo"><img src="../img/pleca-gob.png" alt="Logo_gobierno" width="450px"></li>
      <li class="barra1"><br><a class="nav-link active" aria-current="page" href="https://www.ipn.mx/directorio-telefonico.html">Directorio</a></li>
      <li class="barra1"><br><a class="nav-link" href="https://www.ipn.mx/correo-electronico.html">Correo</a></li>
      <li class="barra1"><br><a class="nav-link" href="https://www.ipn.mx/calendario-academico.html">Calendario</a></li>
      <li class="barra1"><br><a class="nav-link" href="https://www.ipn.mx/buzon.html">Buzón</a></li>
    </ul>
  </nav>
  
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
          <li class="nav-item"><br><a class="nav-link" href="administrador.php">Administrador</a></li>
          <a class="navbar-brand" href="../index.php"><img src="../img/escomlogo.png" alt="LogoIpn" style="width: 80px;"></a>  
        </ul>
      </div>
    </div>
  </nav>

  <div class="main-container">
  <div class="container d-flex align-items-center justify-content-center">
    <form action="procesar_administrador.php" method="post">
      <div class="contenedor text-center">  
        <h2>Iniciar sesión como Administrador.</h2>
        
        <div class="imagen mt-4 mx-auto d-flex align-items-center">
          <img src="../img/administrador.png" alt="imagen admin" width="210px">
        </div>
        
        <div class="form-group mt-3">
          <label for="correo">Correo electrónico:</label>
          <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingresa el correo electrónico" required>
        </div>

        <div class="form-group mt-3">
          <label for="contrasena">Contraseña:</label>
          <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Ingresa la contraseña" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Iniciar Sesión</button>
      </div>
    </form>
  </div>
</div>









<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<br><br><br>
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
          <img src="../img/Logo_del_Gobierno.png"  width="200px" alt="gobierno" class="logo_footer" style="max-width: 90%;">
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
          <p class="h5 mb-3">Enlaces</p>
          <div class="mb-1">
            <a class="text-white" target="_blank" href="https://participa.gob.mx">Participa</a>
          </div>
          <div class="mb-1">
            <a class="text-white" target="_blank" href="https://www.gob.mx/publicaciones">Publicaciones Oficiales</a>
          </div>
          <div class="mb-1">
            <a class="text-white" target="_blank" href="http://www.ordenjuridico.gob.mx">Marco Jurídico</a>
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
                  <img src="../img/facebook.png" alt="facebook" width="50px">
                </a>

                <a href="https://twitter.com/GobiernoMX" target="_blank" class="text-decoration-none">
                  <img src="../img/twitter.png" alt="x" width="50px">
                </a>

          </div>
        </div>

      </div>

    </div>

</footer>
</html>
