<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Usuario.php';

// Solo administrador puede registrar usuarios (puedes activar esto después si quieres)
// if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
//     header("Location: login.php");
//     exit;
// }

$error = '';
$success = '';

if (isset($_REQUEST['nombre']) && isset($_REQUEST['pass']) && isset($_REQUEST['pass_confirm']) && isset($_REQUEST['rol'])) {
    $nombre = trim($_REQUEST['nombre'] ?? '');
    $pass = trim($_REQUEST['pass'] ?? '');
    $passConfirm = trim($_REQUEST['pass_confirm'] ?? '');

    if (!$nombre || !$pass || !$passConfirm) {
        $error = 'Por favor, completa todos los campos.';
        include '../View/registrar_view.php';
        exit;
    } elseif ($pass !== $passConfirm) {
        $error = 'Las contraseñas no coinciden.';
        include '../View/registrar_view.php';
        exit;
    } elseif (Usuario::exists($nombre)) {
        $error = 'El nombre de usuario ya está registrado.';
        include '../View/registrar_view.php';
        exit;
    } else {
        // El admin elige el rol del nuevo usuario
        $rol = $_REQUEST['rol'] ?? 'cliente';
        if (!in_array($rol, ['admin', 'cliente'])) {
            $rol = 'cliente';
        }

        $usuario = new Usuario(null, $nombre, $pass, $rol);
        $usuario->insert();

        $success = 'Usuario registrado correctamente.';
        include '../View/login_view.php';
        exit; // ← evita que se siga cargando registrar_view.php
    }
} else {
    include '../View/registrar_view.php';
}
