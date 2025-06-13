<?php
require_once '../Model/Carrito.php';
if (session_status() == PHP_SESSION_NONE) session_start();

// Comprobar si el usuario está logueado
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'cliente') {
    header("Location: ../Controller/login.php");
    exit();
}

// Comprobar si se han enviado los datos del formulario
if (!isset($_POST['codigos']) || !isset($_POST['cantidades'])) {
    throw new Exception("Datos de actualización incompletos.");
}

$idUsuario = $_SESSION['usuario']['id'];
$codigos = $_POST['codigos'];
$cantidades = $_POST['cantidades'];

try {
    Carrito::actualizarCantidades($idUsuario, $codigos, $cantidades);
    header("Location: ../View/carrito_view.php");
    exit();
} catch (Exception $e) {
    // Puedes guardar el error en la sesión si quieres mostrarlo en la vista
    $_SESSION['error_carrito'] = $e->getMessage();
    header("Location: ../View/carrito_view.php");
    exit();
}
