<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Carrito.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'cliente') {
    header("Location: ../Controller/login.php");
    exit();
}

try {
    // Ejecutar la compra para el usuario actual
    Carrito::comprar($_SESSION['usuario']['id']);

    // Redirigir a la vista de factura o confirmación
    header("Location: ../View/factura_view.php");
    exit();
} catch (Exception $e) {
    // Puedes guardar el error en la sesión para mostrarlo en la vista
    $_SESSION['error_compra'] = $e->getMessage();
    header("Location: ../View/carrito_view.php");
    exit();
}
