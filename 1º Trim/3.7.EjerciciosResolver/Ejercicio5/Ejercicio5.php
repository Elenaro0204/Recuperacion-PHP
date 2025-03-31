<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <style>
        body {
            text-align: center;
            margin: 0 auto;
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
    <h1>Ejercicio 5</h1>
    <p>Diseñar un desarrollo web simple con PHP que dé respuesta a la necesidad que se plantea a continuación:
        Un operario de una fábrica recibe cada cierto tiempo un depósito cilíndrico de dimensiones variables, que debe
        llenar de aceite a través de una toma con cierto caudal disponible. Se desea crear una aplicación web que le
        indique cuánto tiempo transcurrirá hasta el llenado del depósito. Para calcular dicho tiempo el usuario
        introducirá los siguientes datos: diámetro y altura del cilindro y caudal de aceite (litros por minuto). Una vez
        introducidos se mostrará el tiempo total en horas y minutos que se tardará en llenar el cilindro.
    </p>

    <?php
    if (isset($_REQUEST['diametro']) && isset($_REQUEST['altura']) && isset($_REQUEST['caudal'])) {
        // Datos introducidos por el usuario
        $diametro = $_REQUEST['diametro'];
        $altura = $_REQUEST['altura'];
        $caudal = $_REQUEST['caudal'];

        $radio = $diametro / 2;

        // Calcular del volumen del cilindro en litros
        // La fórmula es V = pi * r^2 * h (en metros cúbicos), y luego convertimos a litros (1 m³ = 1000 litros)
        $volumen = pi() * pow($radio, 2) * $altura * 1000;  // volumen en litros

        // Calcular el tiempo en minutos
        $tiempo_minutos = $volumen / $caudal;

        // Convertir el tiempo de minutos a horas y minutos
        $horas = floor($tiempo_minutos / 60);
        $minutos = round($tiempo_minutos % 60);

    ?>
        <table>
            <caption>Datos</caption>
            <tr>
                <th>Diámetro</th>
                <td><?= $diametro ?> m</td>
            </tr>
            <tr>
                <th>Altura</th>
                <td><?= $altura ?> m</td>
            </tr>
            <tr>
                <th>Caudal</th>
                <td><?= $caudal ?> m/s</td>
            </tr>
            <tr>
                <th>Volumen</th>
                <td><?= round($volumen, 2) ?> m cúbicos</td>
            </tr>
            <tr>
                <th>Tiempo (hh y mm)</th>
                <td>
                    <?= $horas ?> hrs.
                    <?= $minutos ?> min.
                </td>
            </tr>
        </table>
    <?php
    } else {
    ?>
        <!-- <form action="solucion5.php" method="post"> -->
        <form action="" method="post">
            <label for="diametro">Diámetro del cilindro:</label>
            <input type="number" id="diametro" name="diametro" min="1" step="0.01" required>

            <br>

            <label for="altura">Altura del cilindro:</label>
            <input type="number" id="altura" name="altura" min="1" step="0.01" required>

            <br>

            <label for="caudal">Caudal de aceite (litros/min):</label>
            <input type="number" id="caudal" name="caudal" min="1" step="0.01" required>

            <br>

            <button type="submit">Calcular tiempo</button>
        </form>
    <?php
    }
    ?>

</body>

</html>