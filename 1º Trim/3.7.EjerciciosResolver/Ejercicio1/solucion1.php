<?php
// Recuperamos los valores introducidos en el formulario.
$radio = $_REQUEST['radio'];
$altura = $_REQUEST['altura'];

// Calculamos el volumen del cilindro.
$volumen = (M_PI * pow($radio,2)) + $altura;
$volumenRedondeado = round($volumen);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solución Ejercicio 1</title>
</head>
<body>
    <h1>Solución Ejercicio 1</h1>

    <p>El volumen del cono es: <?= $volumen?> m cúbicos</p>
    <p>Redondeado es: <?= $volumenRedondeado?> m cúbicos</p>

    <a href="Ejercicio1.php">Volver al formulario</a>  <!-- Link para volver al formulario -->
</body>
</html>