<?php
if (session_status() == PHP_SESSION_NONE) session_start();

// Inicializar productos si es la primera vez
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [
        'Pizza' => ['precio' => 8, 'detalle' => 'Pizza con queso y pepperoni', 'imagen' => 'pizza.jpg'],
        'Hamburguesa' => ['precio' => 7, 'detalle' => 'Hamburguesa con queso y bacon', 'imagen' => 'hamburguesa.jpg'],
        'Taco' => ['precio' => 5, 'detalle' => 'Taco mexicano con carne y guacamole', 'imagen' => 'taco.jpg']
    ];
}

// Inicializar cesta desde cookie si existe
if (!isset($_SESSION['cesta']) && isset($_COOKIE['cesta'])) {
    $_SESSION['cesta'] = unserialize($_COOKIE['cesta']);
}

// Añadir a la cesta
if (isset($_REQUEST['add'])) {
    $producto = $_REQUEST['add'];
    if (!isset($_SESSION['cesta'][$producto])) {
        $_SESSION['cesta'][$producto] = 0;
    }
    $_SESSION['cesta'][$producto]++;
    setcookie('cesta', serialize($_SESSION['cesta']), time() + (30 * 24 * 60 * 60));
    header("Location: Ejercicio3.php");
    exit();
}

// Contar productos en la cesta
$total_en_cesta = 0;
if (isset($_SESSION['cesta'])) {
    foreach ($_SESSION['cesta'] as $cantidad) {
        $total_en_cesta += $cantidad;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 Sesiones</title>
</head>

<body>
    <h1>Ejercicio 3</h1>
    <p>Realizar una tienda con un carrito de la compra más completo que el realizado en el boletín. En la página
        principal tendremos un listado compuesto por una tabla con 4 columnas, nombre del producto, precio, imagen
        y botón para añadir a la cesta, si se añade más de una vez se aumenta la cantidad del producto en la cesta.
        También se mostrará cuantos productos hay en la cesta en todo momento y un enlace para acceder a dicha cesta
        que mostrará otro listado de los productos añadidos y su cantidad, junto a cada producto habrá un botón eliminar
        que permita quitar una unidad de ese producto y si se llega a 0 se elimina el producto de la cesta. Al final de la
        cesta se mostrará el importe total de todos los productos y un botón o enlace para cerrar la cesta y volver a la
        página principal.</p>
    <p>Por último, en la página principal al pulsar sobre la imagen de un producto se abrirá en otra página la imagen
        a tamaño original (algo más grande) junto con los datos del producto y el detalle del mismo (una breve
        descripción).</p>
    <p>Crear manualmente en código, un array de sesión con todos los productos la primera vez que se carga la página
        en una sesión nueva (con 3 o 4 productos es suficiente). El array puede ser asociativo con clave ‘nombre del
        producto’ y valor un array con los valores ‘precio, detalle’ y la imagen puede coincidir con el nombre del
        producto más la extensión</p>
    <p>Los productos añadidos en la cesta deben almacenarse en una cookie por si se cierra el navegador y se abre de
        nuevo se recuperen automáticamente los productos añadidos a la cesta.</p>

    <h2>Tienda Online</h2>
    <p>Productos en la cesta: <strong><?php echo $total_en_cesta; ?></strong> | <a href="Ejercicio3_cesta.php">Ver cesta</a></p>

    <table border="1" cellpadding="10">
        <tr>
            <th>Producto</th>
            <th>Precio (€)</th>
            <th>Imagen</th>
            <th>Acción</th>
        </tr>
        <?php foreach ($_SESSION['productos'] as $nombre => $info): ?>
            <tr>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $info['precio']; ?> €</td>
                <td>
                    <a href="Ejercicio3_detalle.php?producto=<?php echo urlencode($nombre); ?>">
                        <img src="img/<?php echo $info['imagen']; ?>" width="100" alt="<?php echo $nombre; ?>">
                    </a>
                </td>
                <td><a href="?add=<?php echo urlencode($nombre); ?>">Añadir a la cesta</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>