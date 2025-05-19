<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['remove'])) {
    $producto = $_REQUEST['remove'];
    if (isset($_SESSION['cesta'][$producto])) {
        $_SESSION['cesta'][$producto]--;
        if ($_SESSION['cesta'][$producto] <= 0) {
            unset($_SESSION['cesta'][$producto]);
        }
        setcookie('cesta', serialize($_SESSION['cesta']), time() + (30 * 24 * 60 * 60));
    }
    header("Location: Ejercicio3_cesta.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cesta</title>
</head>
<body>
    <h1>Tu cesta de la compra</h1>
    <a href="Ejercicio3.php">Volver a la tienda</a>

    <?php if (empty($_SESSION['cesta'])): ?>
        <p>No hay productos en la cesta.</p>
    <?php else: ?>
        <table border="1" cellpadding="10">
            <tr>
                <th>Producto</th>
                <th>Precio unitario (€)</th>
                <th>Cantidad</th>
                <th>Total (€)</th>
                <th>Acción</th>
            </tr>
            <?php
            $total = 0;
            foreach ($_SESSION['cesta'] as $nombre => $cantidad):
                $precio = $_SESSION['productos'][$nombre]['precio'];
                $subtotal = $precio * $cantidad;
                $total += $subtotal;
            ?>
                <tr>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $precio; ?></td>
                    <td><?php echo $cantidad; ?></td>
                    <td><?php echo $subtotal; ?></td>
                    <td><a href="?remove=<?php echo urlencode($nombre); ?>">Eliminar una unidad</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Total:</strong></td>
                <td colspan="2"><strong><?php echo $total; ?> €</strong></td>
            </tr>
        </table>
    <?php endif; ?>
</body>
</html>
