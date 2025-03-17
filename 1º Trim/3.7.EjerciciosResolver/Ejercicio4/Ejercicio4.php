<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    <h1>Ejercicio 4</h1>
    <p>Diseñar un desarrollo web simple con php que pida al usuario el precio de un producto en tres establecimientos
        distintos denominados “Tienda 1”, “Tienda 2” y “Tienda 3”. Una vez se introduzca esta información se debe
        calcular y mostrar el precio medio del producto en las tres tiendas. Mostrar en la página resultado, una tabla
        con un título, el precio en cada una de las tiendas, la media de los tres precios y la diferencia del precio de cada
        tienda con la media. Combina celdas para que quede visualmente agradable. </p>

    <form action="solucion4.php" method="post">
        <label for="tienda1">Precio Tienda 1:</label>
        <input type="number" id="tienda1" name="tienda1" required>

        <br>

        <label for="tienda2">Precio Tienda 2:</label>
        <input type="number" id="tienda2" name="tienda2" required>

        <br>

        <label for="tienda3">Precio Tienda 3:</label>
        <input type="number" id="tienda3" name="tienda3" required>

        <br>

        <button type="submit">Calcular</button>
    </form>
</body>

</body>

</html>