<?php
require_once '../Model/Carrito.php';

// Ejecutar la compra
Carrito::comprar();

// Redirigir a la vista de factura o confirmación de compra
header("Location: ../View/factura_view.php");