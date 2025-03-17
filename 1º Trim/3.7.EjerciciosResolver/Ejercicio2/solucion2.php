<?php
// Recupero la combinación de números.
$combinacion = $_REQUEST['combinacion'];
$serieIntroducida = $_REQUEST['serie'];

// Inicializo un array para almacenar los resultados.
$resultados = array();
$serie = rand(1, 999);

// Itero sobre cada número de la combinación.
for ($i = 0; $i < 6; $i++) {
    // Extraigo el número actual.
    $resultados[$i] = rand(1, 49);
}

// Comparo la combinación con la serie generada.
$numerosAcertados = 0;
foreach ($combinacion as $numero) {
    if (in_array($numero, $resultados)) {
        $numerosAcertados++;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solución Ejercicio 2</title>
</head>

<body>
    <h1>Solución Ejercicio 2</h1>

    <h2>Combinación introducida:</h2>
    <table border="1">
        <tr>
            <?php foreach ($combinacion as $numero) : ?>
                <td><?php echo $numero; ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td colspan="6">Serie introducida: <?= $serieIntroducida ?></td>
        </tr>
    </table>

    <h2>Combinación generada:</h2>
    <table border="1">
        <tr>
            <?php foreach ($resultados as $numero) : ?>
                <td><?php echo $numero; ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td colspan="6">Serie generada: <?= $serie ?></td>
        </tr>
    </table>

    <h2>Números de Aciertos:</h2>
    <p><?php echo $numerosAcertados; ?></p>

    <h2>Resultado:</h2>
    <?php if ($numerosAcertados == 6) {?>
        <p>Has ganado!</p>
    <?php } else {?>
        <p>Has perdido.</p>
    <?php }?>

    <a href="Ejercicio2.php">Volver al formulario</a>  <!-- Link para volver al formulario -->

</body>

</html>