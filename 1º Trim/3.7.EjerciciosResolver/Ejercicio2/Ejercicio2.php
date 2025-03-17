<?php
$combinacion = array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    <h1>Ejercicio 2</h1>
    <p>Diseñar una web para jugar a la lotería primitiva. En un formulario se pedirá introducir la combinación de 6
        números entre 1 y 49 y el número de serie entre 1 y 999. Mostrar la combinación generada y la introducida por
        el usuario en dos filas de una tabla.</p>

    <form action="solucion2.php" method="post">
        <label for="combinacion">Combinación:</label>
        <?php
        for ($i = 0; $i < 6; $i++) {
        ?>
            <input type="number" name="combinacion[<?= $i ?>]" min=1 max=49 required>';
        <?php
        }
        ?> <label for="serie">Serie:</label>
        <input type="text" id="serie" name="serie" min=1 max=999 required>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>