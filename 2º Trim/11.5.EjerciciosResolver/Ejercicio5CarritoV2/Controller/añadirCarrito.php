<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../Model/Carrito.php';
if (session_status() == PHP_SESSION_NONE) session_start();

// Asegurarse de que hay usuario logueado
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'cliente') {
    header("Location: ../Controller/login.php");
    exit();
}

// Validar que se haya enviado el código del producto
if (!isset($_REQUEST['codigo'])) {
    header("Location: ../View/indexcliente_view.php");
    exit();
}

$codigoProducto = $_REQUEST['codigo'];
$idUsuario = $_SESSION['usuario']['id'];

try {
    // Añadir el producto a la cesta en la base de datos
    Carrito::anadirProducto($idUsuario, $codigoProducto);
    header("Location: ../View/carrito_view.php");
    exit();
} catch (Exception $e) {
    // Puedes mostrar un error en la vista si lo deseas
    $_SESSION['error_carrito'] = $e->getMessage();
    header("Location: ../View/indexcliente_view.php");
    exit();
}
