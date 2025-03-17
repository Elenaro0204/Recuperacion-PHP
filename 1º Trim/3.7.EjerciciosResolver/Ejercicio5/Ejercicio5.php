<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
    <h1>Ejercicio 5</h1>
    <p>Diseñar un desarrollo web simple con PHP que dé respuesta a la necesidad que se plantea a continuación:
        Un operario de una fábrica recibe cada cierto tiempo un depósito cilíndrico de dimensiones variables, que debe
        llenar de aceite a través de una toma con cierto caudal disponible. Se desea crear una aplicación web que le
        indique cuánto tiempo transcurrirá hasta el llenado del depósito. Para calcular dicho tiempo el usuario
        introducirá los siguientes datos: diámetro y altura del cilindro y caudal de aceite (litros por minuto). Una vez
        introducidos se mostrará el tiempo total en horas y minutos que se tardará en llenar el cilindro.
    </p>

    <form action="solucion5.php" method="post">
        <label for="diametro">Diámetro del cilindro:</label>
        <input type="number" id="diametro" name="diametro" min="1" required>

        <br>

        <label for="altura">Altura del cilindro:</label>
        <input type="number" id="altura" name="altura" min="1" required>

        <br>

        <label for="caudal">Caudal de aceite (litros/min):</label>
        <input type="number" id="caudal" name="caudal" min="1" required>

        <br>

        <button type="submit">Calcular tiempo</button>
    </form>
</body>

</html>