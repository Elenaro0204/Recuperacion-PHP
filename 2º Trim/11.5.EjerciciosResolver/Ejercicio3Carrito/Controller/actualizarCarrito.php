<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../Model/Carrito.php';
if (!isset($_POST['codigos']) || !isset($_POST['cantidades'])) {
    throw new Exception("Datos de actualización incompletos.");
}
Carrito::actualizarCantidades($_POST['codigos'], $_POST['cantidades']);
header("Location: ../View/carrito_view.php");
