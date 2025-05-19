<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Objetos</title>
</head>

<body>
    <h1>Ejercicio 1</h1>

    <p>Confeccionar una clase Empleado con los atributos nombre y sueldo.
        Definir un método “asigna” que reciba como dato el nombre y sueldo y actualice los atributos (debe comprobar
        que el nombre recibido coincide con el atributo nombre y si es así actualiza el atributo sueldo con el sueldo
        recibido).</p>
    <p>Plantear un segundo método que imprima el nombre y un mensaje si debe o no pagar impuestos (si el sueldo
        supera a 3000 paga impuestos).</p>

    <?php
    include_once 'Empleado.php';
    ?>

    <h2>Datos:</h2>
    <p><b>Nombre:</b> Elena</p>
    <p><b>Sueldo:</b> 2800 €</p>
    <?php
    // Crear instancia de Empleado
    $empleado = new Empleado("Elena", 2800);
    ?>
    <h3>¿Debe pagar impuestos?</h3>
    <?php
    // Probar si debe pagar impuestos
    echo $empleado->imprimirMensajeImpuestos(); // Debería decir que NO paga
    ?>

    <h2>Datos:</h2>
    <p><b>Nombre:</b> Elena</p>
    <p><b>Sueldo:</b> 3500 €</p>
    <?php
    // Intentar actualizar sueldo con nombre correcto
    if ($empleado->asigna("Elena", 3500) == true) {
        echo "<p>Sueldo actualizado correctamente.</p>";
    } else {
        echo "<p>El nombre proporcionado no coincide con el del empleado.</p>";
    }
    ?>
    <h3>¿Debe pagar impuestos?</h3>
    <?php
    // Verificar de nuevo si debe pagar impuestos
    echo $empleado->imprimirMensajeImpuestos(); // Ahora SÍ debería pagar
    ?>

    <h2>Datos:</h2>
    <p><b>Nombre:</b> Carlos</p>
    <p><b>Sueldo:</b> 4000 €</p>
    <?php
    // Intentar actualizar con nombre incorrecto
    if ($empleado->asigna("Carlos", 4000) == true) {
        echo "<p>Sueldo actualizado correctamente.</p>";
    } else {
        echo "<p>El nombre proporcionado no coincide con el del empleado.</p>";
    }
    ?>
</body>

</html>