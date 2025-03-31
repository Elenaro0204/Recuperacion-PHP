<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 Arrays V2</title>
</head>

<body>
    <h1>Ejercicio 2</h1>
    <p>Realizar una página web para realizar pedidos de comida rápida. Tenemos varios tipos de
        comida: Pizza: jamon, atun, bacon, pepperoni; Hamburguesa: lechuga, tomate, queso; Perrito
        caliente: lechuga, cebolla, patata; etc (la carta con todas las comidas y sus ingredientes estará
        almacenada en un array). A través de formularios distintos, uno para cada tipo de comida se va
        añadiendo comida al pedido con sus respectivos ingredientes, hasta que se pulse el botón
        finalizar pedido (en otro formulario), con lo que se mostrará el pedido completo en una tabla,
        con toda la comida y los ingredientes seleccionados de cada una. Usa la función serialize() y
        unserialize() para pasar arrays como cadenas.</p>

    <?php
    // Definir opciones de comida
    $comida = [
        'pizza' => ['jamón', 'atún', 'bacon', 'pepperoni'],
        'hamburguesa' => ['lechuga', 'tomate', 'queso'],
        'perrito_caliente' => ['lechuga', 'cebolla', 'patata']
    ];

    // Recuperar pedidos anteriores si existen
    $pedidos = [];
    if (isset($_POST['pedidos_guardados'])) {
        $pedidos = unserialize($_POST['pedidos_guardados']);
    }

    // Incrementar número de pedido
    $numpedido = count($pedidos) + 1;

    // Guardar el nuevo pedido si se envió el formulario
    if (isset($_POST['comida'])) {
        $pedidos["Pedido " . $numpedido] = $_POST['comida'];
    }
    ?>

    <h1>Comida rápida "El Gordito"</h1>
    <h2>Seleccione la comida para el Pedido <?= $numpedido ?>:</h2>
    <!-- Forma complicada -->
    <form method="post">
        <?php foreach ($comida as $tipo => $ingredientes) : ?>
            <h3><?= ucfirst(str_replace('_', ' ', $tipo)) ?>:</h3>
            <?php foreach ($ingredientes as $ingrediente) : ?>
                <input type="checkbox" id="<?= $tipo . '_' . $ingrediente ?>" name="comida[<?= $tipo ?>][]" value="<?= $ingrediente ?>">
                <label for="<?= $tipo . '_' . $ingrediente ?>"><?= ucfirst($ingrediente) ?></label><br>
            <?php endforeach; ?>
            <hr>
        <?php endforeach; ?>
        <!-- Guardar pedidos anteriores en un input oculto -->
        <input type="hidden" name="pedidos_guardados" value='<?= htmlspecialchars(serialize($pedidos)) ?>'>
        <input type="submit" value="Finalizar Pedido">
    </form>

    <?php
    // Mostrar historial de pedidos
    if (!empty($pedidos)) {
        echo "<h2>Historial de Pedidos</h2>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Número de Pedido</th><th>Comida</th><th>Ingredientes</th></tr>";

        foreach ($pedidos as $pedidoNum => $pedido) {
            foreach ($pedido as $tipo => $ingredientes) {
                echo "<tr>";
                echo "<td>" . $pedidoNum . "</td>";
                echo "<td>" . ucfirst(str_replace('_', ' ', $tipo)) . "</td>";
                echo "<td>" . implode(", ", array_map('ucfirst', $ingredientes)) . "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }
    ?>
</body>

</html>