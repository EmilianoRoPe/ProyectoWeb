<?php 
$host_name = 'localhost';
$database = 'registro_usuario';
$user_name = 'root';
$password = '';

$conexion = new mysqli($host_name, $user_name, $password, $database);

if (mysqli_error($conexion)){
     echo "Error al conectarme";
}else{
    //echo "Me conecte a la base de datos";
}

$acentos = $conexion -> query("SET NAMES 'utf8' " );

?>