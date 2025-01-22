<?php
// Incluye tu código de conexión y funciones necesarias
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['eliminar_registro'])) {
        // Maneja la eliminación aquí, similar a tu código actual

        // Devuelve una respuesta (puedes personalizarla según tu lógica)
        echo "Registro eliminado exitosamente.";
    } elseif (isset($_POST['actualizar_registro'])) {
        // Maneja la actualización aquí, similar a tu código actual

        // Devuelve una respuesta (puedes personalizarla según tu lógica)
        echo "Registro actualizado exitosamente.";
    }
}
?>
