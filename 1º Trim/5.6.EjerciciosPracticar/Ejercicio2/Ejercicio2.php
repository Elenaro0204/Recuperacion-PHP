<?php
$numeros = [];
$maximo = PHP_INT_MIN;
$minimo = PHP_INT_MAX;

if (isset($_REQUEST['subir'])) {
    foreach ($_REQUEST['numeros'] as $numero) {
        $numeros[] = $numero;
        if ($numero > $maximo) {
            $maximo = $numero;
        }
        if ($numero < $minimo) {
            $minimo = $numero;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 Practica Arrays</title>
</head>

<body>
    <h1>Ejercicio 2</h1>
    <p>Escribe un programa que pida 10 números por teclado y que luego muestre los números introducidos junto
        con las palabras “máximo” y “mínimo” al lado del máximo y del mínimo respectivamente</p>
    <form action="" method="post">
        <?php

        for ($i = 1; $i <= 10; $i++) {
        ?>
            <label for="numero">Introduce el <?= $i ?>º número</label>
            <input type="number" id="numero" name="numeros[<?= $i ?>]" required>
            <br>
        <?php
        }
        ?>
        <input type="submit" name="subir" value="Añadir">
    </form>
    <?php if (isset($numeros)) {?>
    <h2>Resultados</h2>
    <p>Números introducidos: <?= implode(", ", $numeros) ?></p>
    <p>Máximo: <?= $maximo ?></p>
    <p>Mínimo: <?= $minimo ?></p>
    <?php }?>
</body>

</html>