<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Carrito.php';

// Verifica si el usuario está logueado
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'cliente') {
    header("Location: ../Controller/login.php");
    exit();
}

// Validar que se haya recibido el código del producto
if (!isset($_REQUEST['codigo'])) {
    header("Location: ../View/carrito_view.php");
    exit();
}

$codigo = (int) $_REQUEST['codigo'];
$usuarioId = $_SESSION['usuario']['id'];

try {
    // Elimina el producto del carrito en base de datos
    Carrito::eliminarProducto($usuarioId, $codigo);
} catch (Exception $e) {
    $_SESSION['error_carrito'] = $e->getMessage();
}

// Redirige a la vista del carrito
header("Location: ../View/carrito_view.php");
exit();
