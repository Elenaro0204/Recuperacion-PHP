<?php
require_once '../Model/Carrito.php';

if (!isset($_REQUEST['codigo'])) {
    header("Location: ../View/productos_view.php");
}

// Añade el producto al carrito usando el código recibido
Carrito::añadirProducto($_REQUEST['codigo']);

// Redirige a la vista del carrito para ver los cambios
header("Location: ../View/carrito_view.php");
