<?php 
$nombre = $_POST['nombre'] ;
$apellido1 = $_POST['apellido1'] ;
$apellido2 = $_POST['apellido2'] ;
$curp = $_POST['curp'] ;
$genero = $_POST['genero'] ;
$fechanac = $_POST['fechanac'] ;
$calle = $_POST['calle'] ;
$Num = $_POST['Num'] ;
$Colonia = $_POST['Colonia'] ;
$CP = $_POST['CP'] ;
$edop = $_POST['edop'] ;
$telefono = $_POST['telefono'] ;
$Correo = $_POST['Correo'] ;
$boleta = $_POST['boleta'] ;
$escuelas = $_POST['escuelas'] ;
$discapacidad = $_POST['discapacidad'] ;


include "conexion.php";

$insertar = "INSERT INTO persona (nombre, apellido1, apellido2, curp, genero, fechanac, discapacidad, calle, Num, Colonia, CP, edop, telefono, Correo, boleta, escuelas) 
            VALUE ('$nombre', '$apellido1', '$apellido2', '$curp', '$genero', '$discapacidad', '$fechanac', '$calle', '$Num', '$Colonia', '$CP', '$edop', '$telefono', '$Correo', '$boleta', '$escuelas')";

if($conexion -> query($insertar) == true){
    header('location: ../procesar.php');
}else{
    echo "No se guardo la informacion";
}

$conexion -> close();

?>


   