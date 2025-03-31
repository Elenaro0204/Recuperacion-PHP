<?php
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solucion Ejercicio 5</title>
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

    <a href="Ejercicio5.php">Volver al formulario</a> <!-- Link para volver al formulario -->
</body>

</html>