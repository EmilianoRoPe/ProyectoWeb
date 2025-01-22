function ValidarFormulario() {
    console.log("Se esta ejecutando.");
      var nombre = document.getElementById("nombre").value;
      var apellido1 = document.getElementById("apellido1").value;
      var apellido2 = document.getElementById("apellido2").value;
      var curp = document.getElementById("curp").value;
      var telefono = document.getElementById("telefono").value;
      var correo = document.getElementById("Correo").value;
      var boleta = document.getElementById("boleta").value;
      var CP = document.getElementById("CP").value;
      var Num = document.getElementById("Num").value;
      var Promedio = document.getElementById("Promedio").value;
      var fechanac = document.getElementById("fechanac").value;
      // Reiniciar mensajes de error
      reiniciarMensajesError();
    
      var isValid = true;
    
      // Validar nombre (solo letras, más de 3 caracteres)
      if (!validarTexto(nombre,/^[A-Z][a-zA-ZÀ-ÿ\s]{2,39}$/)) {
        mostrarError("group_nombre", "El nombre debe empezar con una letra mayúscula y debe ser mayor a 3 digitos.");
        document.getElementById("group_nombre").classList.add('form-group-incorrecto');
        document.getElementById("group_nombre").classList.remove('form-group-correcto');
        isValid = false;
        console.log("El nombre esta mal.");
      }
      console.log("Se esta ejecutando1.");
    
      // Validar apellido1 (solo letras)
      if (!validarTexto(apellido1,/^[A-Z][a-zA-ZÀ-ÿ]{2,39}$/)) {
        mostrarError("group_apellido1", "Favor de ingresar su apellido correctamente, empezando con la primera letra en mayúscula.");
        document.getElementById("group_apellido1").classList.add('form-group-incorrecto');
        document.getElementById("group_apellido1").classList.remove('form-group-correcto');
        isValid = false;
        console.log("apellido 1 mal");
      }
      console.log("Se esta ejecutando2.");
    
      // Validar apellido2 (solo letras)
      if (!validarTexto(apellido2,/^[A-Z][a-zA-ZÀ-ÿ]{2,39}$/)) {
        mostrarError("group_apellido2", "Favor de ingresar su apellido correctamente, empezando con la primera letra en mayúscula.");
        document.getElementById("group_apellido2").classList.add('form-group-incorrecto');
        document.getElementById("group_apellido2").classList.remove('form-group-correcto');
        isValid = false;
        console.log("apellido 2 mal.");
      }
    
      // Validar CURP
      if (!validarCURP(curp)) {
        mostrarError("group_curp", "Ingrese un CURP válido.");
        document.getElementById("group_curp").classList.add('form-group-incorrecto');
        document.getElementById("group_curp").classList.remove('form-group-correcto');
        isValid = false;
      }
    
      // Validar teléfono (10 dígitos numéricos)
      if (!validarTelefono(telefono)) {
        mostrarError("group_telefono", "Ingrese un número de teléfono válido de 10 dígitos.");
        document.getElementById("group_telefono").classList.add('form-group-incorrecto');
        document.getElementById("group_telefono").classList.remove('form-group-correcto');
        isValid = false;
      }
    
      // Validar correo electrónico
      if (!validarCorreo(correo)) {
        mostrarError("group_correo", "Ingrese un correo electrónico válido.");
        document.getElementById("group_correo").classList.add('form-group-incorrecto');
        document.getElementById("group_correo").classList.remove('form-group-correcto');
        isValid = false;
      }
    
      // Validar boleta (máximo 10 dígitos, empieza con números, PE o PP)
      if (!validarBoleta(boleta)) {
        mostrarError("group_boleta", "Ingrese un número de boleta válido, maximo 10 digitos, comience con PE,PP o 2 números.");
        document.getElementById("group_boleta").classList.add('form-group-incorrecto');
        document.getElementById("group_boleta").classList.remove('form-group-correcto');
        isValid = false;
      }
  
      if (!validarCP(CP)) {
          mostrarError("group_CP", "Ingrese un número maximo de 5 digitos.");
          document.getElementById("group_CP").classList.add('form-group-incorrecto');
          document.getElementById("group_CP").classList.remove('form-group-correcto');
          isValid = false;
        }
  
      if (!validarNum(Num)) {
        mostrarError("group_Num", "Ingrese un número del 1-99.");
        document.getElementById("group_Num").classList.add('form-group-incorrecto');
        document.getElementById("group_Num").classList.remove('form-group-correcto');
        isValid = false;
       }
      if(!validarPromedio(Promedio)){
        mostrarError("group_Promedio", "Ingrese un número entero con máximo dos decimales.");
        document.getElementById("group_Promedio").classList.add('form-group-incorrecto');
        document.getElementById("group_Promedio").classList.remove('form-group-correcto');
        isValid = false;
      }
      if(!validarfechanac(fechanac,/^(199[0-9]|200[0-9])-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3[01])$/)){
         mostrarError("group_fechanac","Ingrese una fecha de nacimiento valida con un rango de 1990-2009.");
         document.getElementById("group_fechanac").classList.add('form-group-incorrecto');
         document.getElementById("group_fechanac").classList.remove('form-group-correcto');
        isValid = false;
      }
    
      // Agregar más validaciones según tus necesidades
    
      return isValid;
    }
  
  
  
    function validarfechanac(fe,re){  //Fecha de nacimiento.
      return re.test(fe);
    }
    
    function validarTexto(valor, regex) { //1,2,3 (nombre,ape1,ape2)
      return regex.test(valor);
    }
    
    function validarCURP(curp) {  //4
      // Incluir la lógica de validación para el CURP
      // Puedes usar la expresión regular existente en el input o personalizarla según tus necesidades
      return /^[A-Z]{4}\d{6}[HM]{1}[A-Z]{5}[0-9A-Z]{2}$/.test(curp);
    }
    
    function validarTelefono(telefono) { //5
      // Validar que el teléfono tenga 10 dígitos numéricos
      return /^\d{10}$/.test(telefono);
    }
  
  
    function validarCP(CP) {  //6
      // Validar que el teléfono tenga 10 dígitos numéricos
      return /^\d{5}$/.test(CP);
    }
  
      function validarNum(Num) {  //7
      // Validar que el teléfono tenga 10 dígitos numéricos
      return /^([1-9]|[1-9][0-9])$/.test(Num);
    }
  
    
    function validarCorreo(correo) {  //8
      // Validar formato de correo electrónico
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo);
    }
    
    function validarBoleta(boleta) {  //9
      // Validar la boleta (máximo 10 dígitos, empieza con números, PE o PP)
      return /^(PE|PP|\d{2})\d{8}$/.test(boleta);
    }
  
    function validarPromedio(Promedio){
      //Validar el promedio (donde debe ser un entero con máximo 2 decimales)
      return /^([1-9](\.\d{1,2})?)$/.test(Promedio);
    }
  
  
  
  
    
    function reiniciarMensajesError() {   
      // Ocultar todos los mensajes de error al iniciar la validación
      var elementosError = document.querySelectorAll(".formulario_input-error");
      elementosError.forEach(function (elemento) {
        elemento.style.display = "none";
      });
    
      // Cambiar el estado de validación a círculos vacíos
      var elementosEstado = document.querySelectorAll(".formulario_validacion-estado");
      elementosEstado.forEach(function (elemento) {
        elemento.classList.remove("fa-circle-check");
        elemento.classList.add("fa-circle-xmark");
      });

      var elementosForm = document.querySelectorAll(".form-group-incorrecto");
      elementosForm.forEach(function(elemento){
        elemento.classList.remove("form-group-incorrecto");
        elemento.classList.add("form-group");
      });

    }
    
    function mostrarError(elementoId, mensaje) {
      // Mostrar el mensaje de error y cambiar el estado de validación a "X"
      var elementoError = document.getElementById(elementoId).querySelector(".formulario_input-error");
      var elementoEstado = document.getElementById(elementoId).querySelector(".formulario_validacion-estado");
    
      elementoError.textContent = mensaje;
      elementoError.style.display = "block";
    
      elementoEstado.classList.remove("fa-circle-check");
      elementoEstado.classList.add("fa-circle-xmark");
      document.getElementById('form_mensaje').classList.add('form_mensaje-activo');
    }
    