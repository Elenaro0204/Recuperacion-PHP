<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Condicionales</title>
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
    <h1>Ejercicio 1</h1>
    <p>Vamos a diseñar un juego para adivinar imágenes mostrando solo alguna parte de ellas. Dividir una
        imagen en un mosaico de 3x3, y mostrar una cuadrícula en la página principal con todos los cuadrados
        del mosaico dados la vuelta. Debajo de la cuadrícula habrá una caja de texto para que el usuario intente
        adivinar el nombre de lo que aparece en la imagen, junto a un botón comprobar.
        Cada vez que el usuario pulse en un cuadrado de la cuadrícula se mostrará el contenido solo de esa
        cuadrícula durante 2 segundos y posteriormente se volverá a ocultar.
        Cuando el usuario escriba algo y pulse el botón comprobar ocurrirá lo siguiente:
        -Si ha acertado se mostrará la imagen completa y un mensaje de felicitación por acertar.
        -Si no ha acertado se mostrará un mensaje indicando que ha fallado y un botón de volver para seguir
        intentándolo.</p>

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
        <button type="submit" name="check">Comprobar</button>
    </form>

    <?php
    // Comprobar si el usuario ha adivinado
    if (isset($_POST['check'])) {
        $guess = strtolower(trim($_POST['guess']));
        $correctAnswer = "loro";

        if ($guess === $correctAnswer) {
            header("Location: completa.php");
            exit;
        } else {
            echo "<p>Incorrecto, sigue intentándolo.</p>";
        }
    }
    ?>
</body>

</html>