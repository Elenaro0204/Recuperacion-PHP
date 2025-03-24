<?php
// Verifica si el formulario ha sido enviado
if (isset($_POST['numeros']) && isset($_POST['serie'])) {
    // Obtener los números seleccionados
    $numerosSeleccionados = $_POST['numeros'];

    // Obtener el número de serie
    $serie = $_POST['serie'];

    // Comprobar si se han seleccionado 6 números
    if (count($numerosSeleccionados) != 6) {
        $error = "Debes seleccionar 6 números.";
    } else {
        // Generar la combinación ganadora aleatoria
        $combinacionGanadora = [];
        while (count($combinacionGanadora) < 6) {
            $numero = rand(1, 49); // Números entre 1 y 49 (puedes cambiar el rango)
            $combinacionGanadora[] = $numero;
        }

        // Comprobar cuántos aciertos ha tenido el usuario
        $aciertos = count(array_intersect($numerosSeleccionados, $combinacionGanadora));

        // Calcular la ganancia
        $ganancia = 0;
        if ($aciertos >= 4) {
            switch ($aciertos) {
                case 4:
                    $ganancia = "Dinero vuelto";
                    break;
                case 5:
                    $ganancia = "30 euros";
                    break;
                case 6:
                    $ganancia = "100 euros";
                    break;
            }
        }

        // Comprobar si acertó el número de serie
        $nserie= rand(1000, 9999); // Número de serie aleatorio entre 1000 y 9999
        if ($serie == $nserie) {
            $ganancia = "500 euros (por acertar el número de serie)";
        }else{
            $ganancia = "Nada (El número de serie no coincide)";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 Condicionales</title>
</head>

<body>
    <h1>Ejercicio 2</h1>
    <p>Mejora el ejercicio de la lotería primitiva del tema anterior. Ahora los números se seleccionan de un
        boleto al estilo “bingo” con filas y columnas, para representar los números seleccionados se usarán
        checkbox, y para el número de serie una caja de texto. Cuando se pulse el botón jugar, se mostrará la
        combinación ganadora generada aleatoriamente y los aciertos que ha tenido. No se usarán estructuras
        repetitivas ni arrays, se mostrará la combinación ganadora en una tabla con una sola fila y un número
        en cada columna.</p>
    <p>Se mostrará el número de aciertos que ha tenido el usuario y cuánto dinero ha ganado:</p>
    <ul>
        <li>menos de 4 aciertos: nada</li>
        <li>4 aciertos: dinero vuelto</li>
        <li>5 aciertos: 30 euros</li>
        <li>6 aciertos: 100 euros</li>
        <li>número de serie: Si se acierta se sumarán 500 euros independientemente del número de aciertos</li>
    </ul>
    <p>Nota: no hace falta comprobar todos los números, solo los de la combinación ganadora, por lo que no
        se controla si el usuario selecciona más de 6 números.</p>

    <form action="" method="post">
        <table>
            <?php
            $contador = 1;  // Variable para llevar la cuenta de los números

            for ($i = 1; $i <= 5; $i++) {
                echo '<tr>';
                for ($j = 0; $j <= 10; $j++) {
            ?>
                    <td>
                        <label for="num<?= $contador ?>"><?= $contador ?></label>
                        <input type="checkbox" id="num<?= $contador ?>" name="numeros[]" value="<?= $contador ?>">
                    </td>
            <?php
                    $contador++;  // Aumenta el contador para el siguiente número
                }
                echo '</tr>';
            }
            ?>
        </table>

        <label for="serie">Número de serie:</label>
        <input type="text" id="serie" name="serie" required>
        <button type="submit">Jugar</button>
    </form>

    <?php if (isset($error)) { ?>
        <p style="color: red;"><?= $error ?></p>
    <?php } ?>

    <?php if (isset($combinacionGanadora) && !isset($error)) { ?>
        <h2>Combinación ganadora:</h2>
        <table>
            <tr>
                <?php foreach ($combinacionGanadora as $numero) { ?>
                    <td><?= $numero ?></td>
                <?php } ?>
            </tr>
        </table>

        <h3>Aciertos: <?= $aciertos ?></h3>
        <h3>Ganancia: <?= $ganancia ?></h3>
    <?php } ?>
</body>

</html>