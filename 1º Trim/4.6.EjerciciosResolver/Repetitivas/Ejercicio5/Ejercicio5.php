<?php
// Definir el número de filas y columnas
$rows = 10;
$columns = 10;

// Verificar si se ha hecho clic en un ojo
$clickedCell = isset($_GET['cell']) ? (int)$_GET['cell'] : -1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 Repetitivas</title>
    <style>
        table {
            border-collapse: collapse;
            margin: auto;
        }

        td {
            width: 60px;
            height: 60px;
            text-align: center;
            padding: 0;
        }

        img {
            width: 50px;
            height: 50px;
        }

        .general {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Ejercicio 5</h1>
    <p>Diseñar una página que esté compuesta por una tabla de 10 filas por 10 columnas, y en cada celda
        habrá una imagen de un ojo cerrado. Cada vez que el usuario pulse un ojo, ser recargará la página con
        todos los ojos cerrados salvo el que se ha pulsado que corresponderá a un ojo abierto.</p>

    <table>
        <?php
        // Forma Original Propia
        for ($i = 0; $i < $rows; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $columns; $j++) {
                // Calcular el índice de la celda
                $cellIndex = $i * $columns + $j;

                echo '<td>';
                echo '<a href="?cell=' . $cellIndex . '">';

                // Determinar si el ojo debe estar abierto o cerrado
                echo '<img src="img/' . ($cellIndex === $clickedCell ? 'ojo_abierto.jfif' : 'ojo_cerrado.jpg') . '" alt="Ojo">';

                echo '</a>';
                echo '</td>';
            }
            echo '</tr>';
        }

        // Forma Óptima del Profesor
        $contador = 0;
        for ($i = 0; $i < $rows; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $columns; $j++) {
                echo '<td>';
                echo '<a href="?cell=' . $contador . '">';

                // Determinar si el ojo debe estar abierto o cerrado
                echo '<img src="img/' . ($contador === $clickedCell ? 'ojo_abierto.jfif' : 'ojo_cerrado.jpg') . '" alt="Ojo">';

                echo '</a>';
                echo '</td>';
                $contador++;
            }
            echo '</tr>';
        }
        ?>
    </table>


</body>

</html>