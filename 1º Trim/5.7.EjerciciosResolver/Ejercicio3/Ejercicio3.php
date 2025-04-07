<?php
    $filas = 10;
    $columnas = 10;
    $limiteIntentos = 5;
    $imagen = "tiles/completa.jpg"; // Imagen de fondo
    $respuestaCorrecta = "loro";

    // Inicializar matriz si no existe
    if (isset($_REQUEST['estado'])) {
        $estado = unserialize($_REQUEST['estado']);
        $intentos = $_REQUEST['intentos'];
    } else {
        $estado = array_fill(0, $filas * $columnas, false); // false = oculto
        $intentos = 0;
    }

    // Si se ha hecho clic en una celda
    if (isset($_REQUEST['pos'])) {
        $pos = $_REQUEST['pos'];
        if (!$estado[$pos]) {
            $estado[$pos] = true;
            $intentos++;
        }
    }

    // Comprobar si ha intentado adivinar
    $mensaje = "";
    $fin = false;
    if (isset($_POST['guess'])) {
        $adivinanza = strtolower(trim($_POST['guess']));
        if ($adivinanza === $respuestaCorrecta) {
            $mensaje = "<h2>¡Has ganado! Era un $respuestaCorrecta.</h2>";
            $fin = true;
        } else {
            $mensaje = "<p>Respuesta incorrecta. Sigue intentando...</p>";
        }
    }

    // Si ha superado el límite de intentos
    if ($intentos >= $limiteIntentos && !$fin) {
        $mensaje = "<h2>Has perdido. Era un $respuestaCorrecta.</h2>";
        $fin = true;
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 Arrays</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
            background-image: url('<?= $imagen ?>');
            background-size: 500px 500px;
        }

        td {
            width: 50px;
            height: 50px;
            border: 1px solid #999;
        }

        .oculto {
            background-color: #ccc;
        }

        .revelado {
            background-color: transparent;
        }

        body {
            text-align: center;
            font-family: Arial;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Ejercicio 3</h1>
    <p>Vamos a hacer el ejercicio de adivinar la imagen oculta del tema 3 más interesante. Para
        empezar, vamos a hacer el mosaico un poco más grande, de 10x10. Además la imagen no se va
        a dividir sino que formará parte del fondo de la tabla y para ocultar o mostrar cada parte del
        mosaico, el fondo de cada celda será transparente u opaco. Cada vez que se pulse un cuadrado,
        la parte de la imagen correspondiente a ese cuadrado se mostrará de manera definitiva, así que
        cada vez se irán mostrando más partes de la imagen. Por último, para rematar y hacerlo todavía
        más interesante, vamos a poner un límite en el número de cuadrados volteados, de modo que,
        si no se adivina la imagen antes de superar ese límite, se mostrará un mensaje indicando que
        ha perdido junto a la imagen completa. Si se acierta introduciendo el nombre correcto en la
        caja de texto antes de superar el límite, también se indicará con un mensaje junto a la imagen
        completa. Ayuda: La tabla con las partes visibles y no visibles de la imagen, se encuentra en una
        única página que se recarga con cada pulsación, pero el resultado del juego tanto si ha ganado
        como si ha perdido, se puede realizar en otra página distinta. Almacenar en un array la situación
        de cada celda (vista u oculta) y pasar el array con la función serialize para mayor comodidad.
    </p>

    <h1>Adivina la imagen oculta</h1>

    <?= $mensaje ?>

    <?php if (!$fin) { ?>
        <table>
            <?php
            for ($i = 0; $i < $filas; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $columnas; $j++) {
                    $index = $i * $columnas + $j;
                    $estilo = $estado[$index] ? "revelado" : "oculto";

                    // Solo se permite clic si la celda está oculta y no se ha alcanzado el límite
                    if (!$estado[$index] && $intentos < $limiteIntentos) {
                        echo "<td class='$estilo'><a href='?pos=$index&estado=" . urlencode(serialize($estado)) . "&intentos=$intentos' style='display:block;width:100%;height:100%;'></a></td>";
                    } else {
                        echo "<td class='$estilo'></td>";
                    }
                }
                echo "</tr>";
            }
            ?>
        </table>

        <form method="post">
            <input type="text" name="guess" placeholder="¿Qué es?" required>
            <input type="hidden" name="estado" value="<?= htmlspecialchars(serialize($estado)) ?>">
            <input type="hidden" name="intentos" value="<?= $intentos ?>">
            <button type="submit">Comprobar</button>
        </form>

        <p>Has usado <?= $intentos ?> de <?= $limiteIntentos ?> intentos.</p>

    <?php } else { ?>
        <img src="<?= $imagen ?>" alt="Imagen completa" width="400">
        <p><a href="Ejercicio3.php">Volver a jugar</a></p>
    <?php } ?>

</body>

</html>