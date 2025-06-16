<?php
function filtrarBusqueda($cadena) {
    $cadena = strtolower($cadena);
    $cadena = trim($cadena);
    $prohibidos = ["'", '"', ";", "\\", "--", "<", ">", "%", "*", "?", "#", "$", "(", ")", "=", "&"];
    $cadena = str_replace($prohibidos, "", $cadena);
    while (strpos($cadena, "  ") !== false) {
        $cadena = str_replace("  ", " ", $cadena);
    }
    return $cadena;
}

// Simulamos una lista de productos
$productos = [
    "Ordenador portátil HP",
    "Raton inalámbrico Logitech",
    "Teclado mecánico Corsair",
    "Monitor Samsung 24 pulgadas",
    "Altavoces Bluetooth JBL",
    "Impresora Epson multifunción",
    "Webcam Full HD Logitech",
    "Disco duro externo Seagate",
];

// Inicializamos variables
$resultados = [];
$busquedaOriginal = isset($_REQUEST["busqueda"]) ? $_REQUEST["busqueda"] : "";
$busquedaFiltrada = filtrarBusqueda($busquedaOriginal);

// Buscar coincidencias si hay algo que buscar
if (!empty($busquedaFiltrada)) {
    foreach ($productos as $producto) {
        if (strpos(strtolower($producto), $busquedaFiltrada) !== false) {
            $resultados[] = $producto;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Búsqueda de productos</title>
</head>
<body>
    <h2>Buscar productos</h2>
    <form method="get" action="">
        <input type="text" name="busqueda" value="<?= htmlspecialchars($busquedaOriginal) ?>" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if (!empty($busquedaOriginal)): ?>
        <h3>Resultados para "<?= htmlspecialchars($busquedaOriginal) ?>":</h3>
        <?php if (!empty($resultados)): ?>
            <ul>
                <?php foreach ($resultados as $res): ?>
                    <li><?= htmlspecialchars($res) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No se encontraron productos que coincidan.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
