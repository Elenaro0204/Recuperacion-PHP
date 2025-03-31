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
    <title>Ejercicio 3 Condicionales</title>
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
    <h1>Ejercicio 3</h1>
    <p>Partiendo del Ejercicio1, amplíalo con la siguiente funcionalidad. En la pantalla principal se mostrará el
        número de intentos que lleva el usuario, que en la primera carga será de 0 intentos y conforme se
        vayan pulsando los cuadrados para descubrir la imagen que esconden se irá aumentando en 1. Cuando
        el usuario intente adivinar la palabra de la imagen, si acierta se mostrará el número de intentos en que

        lo ha conseguido, y si ha fallado mostrará el número de intentos que lleva hasta ese momento, y al
        volver a la pantalla principal seguirá aumentando el número de intentos que llevaba.
        Nota: para controlar el número de intentos es necesario pasarlo como parámetro cada vez que se
        navega de una página a otra, si no se pierde su valor. </p>

    <?php
    // Comprobar si el usuario ha adivinado
    if (isset($_POST['check'])) {
        $guess = strtolower(trim($_POST['guess']));

        if ($guess === $correctAnswer) {
    ?>
            <h1>¡Felicidades, has acertado!</h1>
            <img src="tiles/completa.jpg" alt="Imagen Completa" width="25%">
            <p><a href="Ejercicio1.php">Volver a jugar</a></p>
    <?php
        } else {
            $intento--;
            if ($intento > 0) {
                echo "<p>Incorrecto, sigue intentándolo.</p>";
            } else {
                echo "<p>Has perdido, la palabra era $correctAnswer.</p>";
                echo "<a href='index.php'>Volver a intentarlo</a>";
            }
        }
    }
    ?>

    <div class="grid">
        <a class='cuadro' href='mostrar.php?tile=0'>?</a>
        <a class='cuadro' href='mostrar.php?tile=1'>?</a>
        <a class='cuadro' href='mostrar.php?tile=2'>?</a>
        <a class='cuadro' href='mostrar.php?tile=3'>?</a>
        <a class='cuadro' href='mostrar.php?tile=4'>?</a>
        <a class='cuadro' href='mostrar.php?tile=5'>?</a>
        <a class='cuadro' href='mostrar.php?tile=6'>?</a>
        <a class='cuadro' href='mostrar.php?tile=7'>?</a>
        <a class='cuadro' href='mostrar.php?tile=8'>?</a>
    </div>

    <form action="" method="post">
        <label for="guess">¿Qué es lo que aparece en la imagen?</label><br>
        <input type="text" id="guess" name="guess"><br><br>
        <input type="text" name="intentos" value="<?= $intento ?>" hidden>
        <button type="submit" name="check">Comprobar</button>
    </form>

    <p>Te quedan <?= $intento ?> intentos.</p>
</body>

</html>