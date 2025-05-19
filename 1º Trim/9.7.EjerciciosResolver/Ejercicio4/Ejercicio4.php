<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 Objetos</title>
</head>

<body>
    <h1>Ejercicio 4</h1>
    <p>Creamos la clase factura con el atributo de clase IVA (21) y los atributos de instancia ImporteBase, fecha,
        estado (pagada o pendiente) y productos (array con todos los productos de la factura, que contiene el nombre,
        precio y cantidad).
        Define los métodos AñadeProducto, ImprimeFactura y los getters y setters de los atributos ImporteBase (solo
        getter, pues su contenido se actualiza automaticamente), fecha y estado.</p>

    <?php

    // Crear una nueva factura
    $factura = new Factura("2025-05-12");

    // Añadir productos
    $factura->añadeProducto("Teclado", 25.5, 2);
    $factura->añadeProducto("Ratón", 15, 1);
    $factura->añadeProducto("Monitor", 199.99, 1);

    // Cambiar estado
    $factura->setEstado("pagada");

    // Imprimir factura
    $factura->imprimeFactura();
    ?>
</body>

</html>