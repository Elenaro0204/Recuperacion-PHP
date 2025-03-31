<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>

    <h1>Ejercicio 1</h1>
    <p>Diseñar un formulario web que pida la altura y el diámetro de un cilindro. Una vez el usuario introduzca los
        datos y pulse el botón calcular, deberá calcularse el volumen del cilindro y mostrarse el resultado en el
        navegador. Mostrar la imagen de un cilindro junto al resultado y un título "Calculo del volúmen de un cilindro",
        intenta dar un aspecto agradable a la página de resultado.</p>
        
    <?php
    // Comprobamos si no se ha enviado los datos del formulario. Si no lo ha hecho, mostramos el formulario.
    if (!isset($_REQUEST['radio'])) {
    ?>
        <!-- <form action="solucion1.php" method="post" id="cilindroForm"> -->
        <form action="" method="post" id="cilindroForm">
            <label for="altura">Altura (m):</label>
            <input type="number" id="altura" name="altura" required>
            <label for="radio">Rádio (m):</label>
            <input type="number" id="radio" name="radio" required>
            <button type="submit">Calcular</button>
        </form>
    <?php
    // Si se han enviado los datos, calculamos el volumen y mostramos el resultado.
    } else {
        // Recuperamos los valores introducidos en el formulario.
        $radio = $_REQUEST['radio'];
        $altura = $_REQUEST['altura'];

        // Calculamos el volumen del cilindro.
        $volumen = (M_PI * pow($radio, 2)) + $altura;
        $volumenRedondeado = round($volumen);
    ?>
        <h1>Solución Ejercicio 1</h1>

        <p>El volumen del cono es: <?= $volumen ?> m cúbicos</p>
        <p>Redondeado es: <?= $volumenRedondeado ?> m cúbicos</p>
    <?php
    }

    ?>
</body>

</html>