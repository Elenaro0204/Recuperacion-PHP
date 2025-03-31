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
        $nserie = rand(1000, 9999); // Número de serie aleatorio entre 1000 y 9999
        if ($serie == $nserie) {
            $ganancia = "500 euros (por acertar el número de serie)";
        } else {
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
    <title>Ejercicio 7 Repetitivas</title>
</head>

<body>
    <h1>Ejercicio 7</h1>
    <p>Realiza el ejercicio 2 correspondiente al juego de la primitiva, pero usando estructuras repetitivas para
        simplificar el código. Pero en esta ocasión lo vamos a realizar de una forma más vistosa gracias a que
        podemos utilizar las estructuras repetitivas. Para mostrar el resultado de la apuesta vamos a mostrar
        una tabla con todos los números de la primitiva, y los números elegidos por el usuario que hayan sido
        aciertos serán de color verde, los elegidos por el usuario que no han sido aciertos serán de color negro,
        los números de la combinación aleatoria que no han sido elegidos por el usuario serán de color rojo y
        por último el resto de números serán de color gris. También contaremos los números seleccionados
        por el usuario y si son más de 6, en vez de mostrar el premio obtenido se mostrará un mensaje
        indicando que ha hecho trampas.</p>

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

        <h2>Combinación del jugador:</h2>
        <table>
            <?php
            $contador = 1;  // Variable para llevar la cuenta de los números
            for ($i = 1; $i <= 5; $i++) {
                echo '<tr>';
                for ($j = 0; $j <= 10; $j++) {

                    echo "<td>";
                    echo '<label style="color:' . ((in_array($contador, $numerosSeleccionados) && $numero === $contador) ? 'green' : 'red') . ';">' . $contador . '</label>';
                    echo "</td>";

                    $contador++;  // Aumenta el contador para el siguiente número
                }
                echo '</tr>';
            }

            $contador = 1;  // Variable para llevar la cuenta de los números

            for ($i = 1; $i <= 5; $i++) {
                echo '<tr>';
                for ($j = 0; $j <= 10; $j++) {
                    if (in_array($contador, $numerosSeleccionados)) {
                        echo "<td>";
                        echo '<label style="color:' . (($numero == $contador) ? 'green' : 'red') . ';">' . $contador . '</label>';
                        echo "</td>";
                    } else {
                        echo "<td></td>"; // Celda vacía si el número no está en el array
                    }
                    $contador++;  // Aumenta el contador para el siguiente número
                }
                echo '</tr>';
            }

            ?>
        </table>

        <h3>Aciertos: <?= $aciertos ?></h3>
        <h3>Ganancia: <?= $ganancia ?></h3>
    <?php } ?>
</body>

</html>