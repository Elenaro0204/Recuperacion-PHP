<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 Objetos</title>
</head>

<body>
    <h1>Ejercicio 3</h1>
    <p>Crear una clase cubo que contenga información sobre la capacidad y su contenido actual en litros. Se podrá
        consultar tanto la capacidad como el contenido en cualquier momento. Dotar a la clase de la capacidad de verter
        el contenido de un cubo en otro (hay que tener en cuenta si el contenido del cubo origen cabe en el cubo destino,
        si no cabe, se verterá solo el contenido que quepa). Hacer una página principal para probar el funcionamiento
        con un par de cubos.</p>

    <?php

    require_once 'Cubo.php';

    // Crear dos cubos
    $cubo1 = new Cubo(10, 7);  // 10 litros de capacidad, 7 litros de contenido
    $cubo2 = new Cubo(5, 2);   // 5 litros de capacidad, 2 litros de contenido

    echo "<h3>Estado inicial de los cubos:</h3>";
    echo "Cubo 1: ";
    echo $cubo1->mostrar();
    echo "Cubo 2: ";
    echo $cubo2->mostrar();

    // Verter contenido del cubo1 en cubo2
    $cubo1->verterEn($cubo2);

    echo "<h3>Después de verter cubo1 en cubo2:</h3>";
    echo "Cubo 1: ";
    echo $cubo1->mostrar();
    echo "Cubo 2: ";
    echo $cubo2->mostrar();
    ?>
    
</body>

</html>