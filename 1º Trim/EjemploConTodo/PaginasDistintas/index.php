<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include "Producto.php";
include "funciones.php";

// Lista de productos (se puede mover a otro archivo si quieres)
$productos = [
    new Producto("Camiseta", 12.99),
    new Producto("Pantalón", 25.50),
    new Producto("Zapatos", 45.00)
];

echo "<h2>" . Producto::getTienda() . "</h2>";
echo "<h3>Productos disponibles:</h3>";
mostrarProductos($productos);
?>

<!-- Formulario -->
<form method="post" action="carrito.php">
    <label>Elige el número del producto:</label>
    <input type="number" name="indice" min="0" max="2">
    <button type="submit">Añadir al carrito</button>
</form>

<?php
// Mostrar carrito actual (igual que antes)
if (isset($_SESSION['carrito'])) {
    $carrito = unserialize($_SESSION['carrito']);

    echo "<h3>Carrito actual:</h3>";
    foreach ($carrito as $item) {
        echo "- " . $item->mostrar() . "<br>";
    }
}
?>

<form method="post" action="guardar.php">
    <button name="guardar">Guardar carrito</button>
</form>
