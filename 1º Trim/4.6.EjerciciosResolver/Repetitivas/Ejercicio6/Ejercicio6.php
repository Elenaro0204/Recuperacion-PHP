<?php
if (!isset($_REQUEST['intentos'])) {
    $intento = 5;
} else {
    $intento = $_REQUEST['intentos'];
}

// Respuesta correcta
$correctAnswer = "loro";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6 Repetitivas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-gap: 5px;
            margin: 20px auto;
        }

        .cuadro {
            width: 100px;
            height: 100px;
            background-color: #ccc;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            color: black;
            font-size: 24px;
            font-weight: bold;
        }

        .cuadro:hover {
            background-color: #aaa;
        }
    </style>
</head>

<body>
    <h1>Ejercicio 6</h1>
    <p>Realiza el ejercicio 1 correspondiente al juego de adivinar una imagen, pero usando estructuras
        repetitivas para simplificar el código. </p>

    <?php
    // Comprobar si el usuario ha adivinado
    if (isset($_POST['check'])) {
        $guess = strtolower(trim($_POST['guess']));

        if ($guess === $correctAnswer) {
    ?>
            <h1>¡Felicidades, has acertado!</h1>
            <img src="tiles/completa.jpg" alt="Imagen Completa" width="25%">
            <p><a href="Ejercicio6.php">Volver a jugar</a></p>
            <?php
        } else {
            $intento--;
            if ($intento > 0) {
                echo "<p>Incorrecto, sigue intentándolo.</p>";
            ?>
                <div class="grid">
                    <?php
                    for ($i = 0; $i < 9; $i++) {
                        echo "<a class='cuadro' href='mostrar.php?tile=$i'>?</a>";
                    }
                    ?>
                </div>

                <form action="" method="post">
                    <label for="guess">¿Qué es lo que aparece en la imagen?</label><br>
                    <input type="text" id="guess" name="guess"><br><br>
                    <input type="text" name="intentos" value="<?= $intento ?>" hidden>
                    <button type="submit" name="check">Comprobar</button>
                </form>
                <p>Te quedan <?= $intento ?> intentos.</p>
        <?php
            } else {
                echo "<p>Has perdido, la palabra era $correctAnswer.</p>";
                echo "<a href='index.php'>Volver a intentarlo</a>";
            }
        }
    } else {
        ?>
        <div class="grid">
            <?php
            for ($i = 0; $i < 9; $i++) {
                echo "<a class='cuadro' href='mostrar.php?tile=$i'>?</a>";
            }
            ?>
        </div>

        <form action="" method="post">
            <label for="guess">¿Qué es lo que aparece en la imagen?</label><br>
            <input type="text" id="guess" name="guess"><br><br>
            <input type="text" name="intentos" value="<?= $intento ?>" hidden>
            <button type="submit" name="check">Comprobar</button>
        </form>
        <p>Te quedan <?= $intento ?> intentos.</p>
    <?php
    }
    ?>
</body>

</html>