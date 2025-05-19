<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_REQUEST['producto']) || !isset($_SESSION['productos'][$_REQUEST['producto']])) {
    echo "Producto no encontrado.";
    exit();
}

$nombre = $_REQUEST['producto'];
$producto = $_SESSION['productos'][$nombre];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de <?php echo $nombre; ?></title>
</head>
<body>
    <h1><?php echo $nombre; ?></h1>
    <img src="img/<?php echo $producto['imagen']; ?>" width="400">
    <p><strong>Precio:</strong> <?php echo $producto['precio']; ?> €</p>
    <p><strong>Descripción:</strong> <?php echo $producto['detalle']; ?></p>
    <p><a href="Ejercicio3.php">Volver a la tienda</a></p>
</body>
</html>
