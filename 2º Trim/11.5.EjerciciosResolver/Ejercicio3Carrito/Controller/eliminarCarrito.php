<?php
require_once '../Model/Carrito.php';

if (!isset($_REQUEST['codigo'])) {
    header("Location: ../View/carrito_view.php");
}

// Llama al método estático para eliminar el producto del carrito por código
Carrito::eliminarProducto((int)$_REQUEST['codigo']);

// Redirige al carrito para que se actualice la vista
header("Location: ../View/carrito_view.php");
