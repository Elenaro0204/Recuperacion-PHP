<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
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

    <h1>Ejercicio 4</h1>
    <p>Diseñar un desarrollo web simple con php que pida al usuario el precio de un producto en tres establecimientos
        distintos denominados “Tienda 1”, “Tienda 2” y “Tienda 3”. Una vez se introduzca esta información se debe
        calcular y mostrar el precio medio del producto en las tres tiendas. Mostrar en la página resultado, una tabla
        con un título, el precio en cada una de las tiendas, la media de los tres precios y la diferencia del precio de cada
        tienda con la media. Combina celdas para que quede visualmente agradable. </p>

    <?php
    // Para hacerlo en una pagina solo
    // Si se han recogido los datos del formulario, muestran el resultado.
    if (isset($_REQUEST['tienda1']) && isset($_REQUEST['tienda2']) && isset($_REQUEST['tienda3'])) {
        // Recogemos los valores de las tiendas
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
    <?php
    // Si no se han recogido los datos del formulario, muestra el formulario para introducir los datos.
    } else {
    ?>
        <!-- <form action="solucion4.php" method="post"> -->
        <form action="" method="post">
            <label for="tienda1">Precio Tienda 1:</label>
            <input type="number" id="tienda1" name="tienda1" required>

            <br>

            <label for="tienda2">Precio Tienda 2:</label>
            <input type="number" id="tienda2" name="tienda2" required>

            <br>

            <label for="tienda3">Precio Tienda 3:</label>
            <input type="number" id="tienda3" name="tienda3" required>

            <br>

            <button type="submit">Calcular</button>
        </form>
    <?php
    }
    ?>
</body>

</body>

</html>