<?php
require_once 'Animal.php';
require_once 'Gato.php';
require_once 'Ave.php';
require_once 'Canario.php';
require_once 'Lagarto.php';
require_once 'Mamifero.php';
require_once 'Perro.php';
require_once 'Pinguino.php';

$animales = [
    new Gato("Misifú"),
    new Perro("Toby"),
    new Canario("Piolín"),
    new Pinguino("Pingu"),
    new Lagarto("Reptilín")
];

function mostrarAnimal($animal)
{
    echo "<div class='animal'>";
    echo "<h3>" . get_class($animal) . " - {$animal->nombre}</h3>";
    echo "<ul>";
    echo "<li>" . $animal->emitirSonido() . "</li>";
    echo "<li>" . $animal->moverse() . "</li>";
    echo "<li>" . $animal->dormir() . "</li>";

    // Métodos específicos
    switch (get_class($animal)) {
        case 'Gato':
            echo "<li>" . $animal->ronronear() . "</li>";
            echo "<li>" . $animal->cazar() . "</li>";
            break;
        case 'Perro':
            echo "<li>" . $animal->traerPelota() . "</li>";
            echo "<li>" . $animal->moverCola() . "</li>";
            break;
        case 'Canario':
            echo "<li>" . $animal->volar() . "</li>";
            echo "<li>" . $animal->saltar() . "</li>";
            break;
        case 'Pinguino':
            echo "<li>" . $animal->volar() . "</li>";
            echo "<li>" . $animal->nadar() . "</li>";
            break;
        case 'Lagarto':
            echo "<li>" . $animal->tomarSol() . "</li>";
            echo "<li>" . $animal->cambiarColor() . "</li>";
            break;
    }

    echo "</ul>";
    echo "</div>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 Objetos</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f8ff;
        }

        .animal {
            border: 1px solid #ccc;
            background: #fff;
            margin: 1em;
            padding: 1em;
            border-radius: 10px;
            box-shadow: 2px 2px 5px #aaa;
        }

        h3 {
            color: #333;
        }

        ul {
            list-style: square;
        }
    </style>
</head>

<body>
    <h1>Ejercicio 5</h1>
    <p>Crea las clases Animal, Mamifero, Ave, Gato, Perro, Canario, Pinguino y Lagarto. Crea, al menos, tres
        métodos específicos de cada clase y redefine el/los método/s cuando sea necesario. Prueba las clases en un
        programa en el que se instancien objetos y se les apliquen métodos. Puedes aprovechar las capacidades que
        proporciona HTML y CSS para incluir imágenes, sonidos, animaciones, etc. para representar acciones de
        objetos; por ejemplo, si el canario canta, el perro ladra, o el ave vuela.</p>

    <h2>Zoológico Virtual 🐾</h2>
    <?php
    foreach ($animales as $a) {
        mostrarAnimal($a);
    }
    ?>
</body>

</html>