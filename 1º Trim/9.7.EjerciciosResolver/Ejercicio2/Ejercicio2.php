<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 Objetos</title>
</head>

<body>
    <h1>Ejercicio 2</h1>
    <p>Confeccionar una clase Menu, con los atributos titulo y enlace (ambos son arrays). Crear los métodos
        necesarios que permitan añadir elementos al menú. Crear los métodos que permitan mostrar el menú en forma
        horizontal o vertical (según que método llamemos).</p>
    <?php

    require_once 'Menu.php';

    // Crear el menú
    $menu = new Menu();
    $menu->agregarElemento("Inicio", "index.php");
    $menu->agregarElemento("Nosotros", "nosotros.php");
    $menu->agregarElemento("Servicios", "servicios.php");
    $menu->agregarElemento("Contacto", "contacto.php");

    // Mostrar menú horizontal
    echo "<h3>Menú horizontal:</h3>";
    echo $menu->mostrarHorizontal();

    // Mostrar menú vertical
    echo "<h3>Menú vertical:</h3>";
    echo $menu->mostrarVertical();
    ?>

</body>

</html>