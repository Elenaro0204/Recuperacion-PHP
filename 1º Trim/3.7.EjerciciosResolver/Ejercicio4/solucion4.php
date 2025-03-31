<?php
$precio1 = $_REQUEST['tienda1'];
$precio2 = $_REQUEST['tienda2'];
$precio3 = $_REQUEST['tienda3'];

// Calculo del precio medio
$promedio = ($precio1 + $precio2 + $precio3) / 3;

// Redondeo del precio medio
$promedioRedondeado = round($promedio);

// Diferencia entre el promedio y los distintso precios
$diferencias = [
    'Tienda 1' => $promedioRedondeado - $precio1,
    'Tienda 2' => $promedioRedondeado - $precio2,
    'Tienda 3' => $promedioRedondeado - $precio3
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solucion Ejercicio 4</title>
    <style>
        body {
            text-align: center;
            margin: 0 auto;
        }

        .positivo {
            color: green;
            font-weight: bold;
        }

        .negativo {
            color: red;
            font-weight: bold;
        }

        table {
            margin: 0 auto;
            width: 50%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

    <table>
        <caption>Comparador de Precios</caption>
        <tr>
            <th>Tienda</th>
            <th>Precio</th>
            <th>Diferencia con el promedio</th>
        </tr>
        <?php foreach ($diferencias as $tienda => $diferencia): ?>
            <tr>
                <td><?= $tienda ?></td>
                <td><?= ${'precio' . explode(' ', $tienda)[1]}; ?> €</td>
                <td class="<?= ($diferencia >= 0) ? 'positivo' : 'negativo'; ?>">
                    <?= $diferencia ?> €
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>Promedio</th>
            <td colspan="2"><?= $promedioRedondeado ?> €</td>
        </tr>
    </table>

    <a href="Ejercicio4.php">Volver al formulario</a> <!-- Link para volver al formulario -->
</body>

</html>