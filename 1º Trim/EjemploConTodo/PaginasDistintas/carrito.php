<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include "Producto.php";

// Lista igual que en index.php (o incluir desde archivo común)
$productos = [
    new Producto("Camiseta", 12.99),
    new Producto("Pantalón", 25.50),
    new Producto("Zapatos", 45.00)
];

if (isset($_REQUEST['indice']) && is_numeric($_REQUEST['indice'])) {
    $i = intval($_REQUEST['indice']);
    if ($i >= 0 && $i < count($productos)) {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = serialize([]);
        }
        $carrito = unserialize($_SESSION['carrito']);
        $carrito[] = $productos[$i];
        $_SESSION['carrito'] = serialize($carrito);
    }
}

header("Location: index.php"); // Redirige al inicio
exit;
?>
