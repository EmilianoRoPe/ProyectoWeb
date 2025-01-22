<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    if ($correo === 'gayeto25@gmail.com' && $contrasena === 'Doerone821<3') {
        $_SESSION['usuario'] = $correo;
        header('Location: gestion.php');
        exit;
    } else {
        // Si las credenciales son incorrectas, muestra un mensaje de error
        echo "Credenciales incorrectas. <a href='administrador.php'>Volver al formulario</a>";
        exit;
    }
} else {
    // Si alguien intenta acceder directamente a este script, redirige al formulario
    header('Location: administrador.php');
    exit;
}
?>
