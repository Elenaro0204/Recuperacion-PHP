<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Usuario.php';

if (isset($_REQUEST['nombre']) && isset($_REQUEST['pass'])) {
    $nombre = $_REQUEST['nombre'];
    $pass = $_REQUEST['pass'];

    $usuario = Usuario::login($nombre, $pass);

    if ($usuario) {
        // Guardamos solo los datos necesarios en sesión
        $_SESSION['usuario'] = [
            'id' => $usuario->getId(),
            'nombre' => $usuario->getNombre(),
            'rol' => $usuario->getRol()
        ];

        // Redirige según el rol
        header("Location: ../Controller/index.php");
        exit();  // <---- importante
    } else {
        // Si las credenciales son incorrectas, volvemos al login con error
        $error = "Nombre o contraseña incorrectos";
        include '../View/login_view.php';
        exit(); // <---- para que no continue el script
    }
} else {
    // Si no se envió formulario, mostramos la vista login para que el usuario pueda loguearse
    include '../View/login_view.php';
}
