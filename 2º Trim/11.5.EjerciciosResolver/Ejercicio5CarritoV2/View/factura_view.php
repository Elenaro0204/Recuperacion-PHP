<?php
$factura = file_get_contents('../ticket.txt');
include 'header.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Factura</title>
    <style>
        body {
            font-family: monospace;
            white-space: pre;
            margin: 20px;
        }
    </style>
</head>

<body>
    <h1>Factura de compra</h1>
    <pre><?= htmlspecialchars($factura) ?></pre>
    <a href="../Controller/index.php">Volver a la tienda</a>
</body>

</html>