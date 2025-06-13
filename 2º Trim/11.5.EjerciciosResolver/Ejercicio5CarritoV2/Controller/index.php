<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (session_status() == PHP_SESSION_NONE) session_start(); // Iniciar o continuar sesión

require_once '../Model/Producto.php';

// Si no hay sesión iniciada, redirige al login
if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit();
}

// Si hay sesión, obtener productos y mostrar vista
$data['productos'] = Producto::getProductos();

// Carga la vista
if ($_SESSION['usuario']['rol'] === 'admin') {
    include '../View/indexadmin_view.php';
} else {
    include '../View/indexcliente_view.php';
}
