<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['eliminar_registro'])) {
        // Procesar eliminación
        $CurpEliminar = $_POST['eliminar_registro'];

        // Consulta SQL de eliminación
        $sqlDelete = "DELETE FROM persona WHERE curp = '$CurpEliminar'";

        if ($conexion->query($sqlDelete) === TRUE) {
            echo "Registro eliminado correctamente.";
        } else {
            echo "Error al eliminar el registro: " . $conexion->error;
        }
    } elseif (isset($_POST['actualizar_registro'])) {
        // Procesar actualización
        $curp = isset($_POST['Curp']) ? $_POST['Curp'] : '';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        // Resto de las variables...

        // Consulta SQL de actualización
        $sqlUpdate = "UPDATE persona SET nombre='$nombre', ... WHERE Curp='$curp'";

        if ($conexion->query($sqlUpdate) === TRUE) {
            echo "Registro actualizado correctamente.";
        } else {
            echo "Error al actualizar el registro: " . $conexion->error;
        }
    }
}
?>