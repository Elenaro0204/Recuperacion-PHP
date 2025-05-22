<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include "Producto.php";

if (isset($_REQUEST['guardar']) && isset($_SESSION['carrito'])) {
    $carrito = @unserialize($_SESSION['carrito']);
    if ($carrito && is_array($carrito)) {
        $f = fopen("carrito.txt", "w");

        $fecha = date("d-m-Y H:i:s");
        fwrite($f, "Fecha de compra: $fecha\n\n");
        fwrite($f, "Contenido del carrito:\n");

        foreach ($carrito as $item) {
            $nombreMayus = strtoupper($item->nombre);
            $nombreReducido = substr($nombreMayus, 0, 10);
            $precioTexto = number_format($item->precio, 2) . " €";
            fwrite($f, "- " . $nombreReducido . " | " . $precioTexto . "\n");
        }

        fwrite($f, "\nTotal de artículos: " . count($carrito) . "\n");
        fclose($f);
        echo "<p>Carrito guardado correctamente.</p>";
    } else {
        echo "<p>Error: carrito no válido.</p>";
    }
} else {
    echo "<p>No hay carrito para guardar.</p>";
}
?>
