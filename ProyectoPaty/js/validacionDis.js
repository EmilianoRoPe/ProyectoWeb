$(document).ready(function() {
    // Ocultar el campo adicional al cargar la página
    $("#otroEscuela_group").hide();
  
    // Mostrar u ocultar el campo adicional al cambiar la opción seleccionada
    $("#escuelas").change(function() {
      if ($(this).val() === "Otro") {
        $("#otroEscuela_group").show();
      } else {
        $("#otroEscuela_group").hide();
      }
    });
  });



  $(document).ready(function() {
    // Ocultar el campo adicional al cargar la página
    $("#otroDiscapacidad_group").hide();
  
    // Mostrar u ocultar el campo adicional al cambiar la opción seleccionada
    $("#discapacidad").change(function() {
      if ($(this).val() === "Otro") {
        $("#otroDiscapacidad_group").show();
      } else {
        $("#otroDiscapacidad_group").hide();
      }
    });
  });


  
