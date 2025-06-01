<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Listado de clientes</title>
</head>

<body>
    <h2>Base de datos <u>banco</u><br>Tabla <u>cliente</u></h2>
    <a href="Ejercicio1_AltaClienteFormulario.php">Dar de alta un nuevo cliente</a><br><br>

    <?php
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }

    $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente");
    ?>

    <table border="1">
        <tr>
            <td><b>DNI</b></td>
            <td><b>Nombre</b></td>
            <td><b>Dirección</b></td>
            <td><b>Teléfono</b></td>
            <td><b>Acciones</b></td>
        </tr>
        <?php while ($cliente = $consulta->fetchObject()) { ?>
            <tr>
                <td><?= $cliente->dni ?></td>
                <td><?= $cliente->nombre ?></td>
                <td><?= $cliente->direccion ?></td>
                <td><?= $cliente->telefono ?></td>
                <td>
                    <a href="Ejercicio1_ModificarClienteFormulario.php?dni=<?= $cliente->dni ?>">Modificar</a> |
                    <a href="Ejercicio1_EliminarCliente.php?dni=<?= $cliente->dni ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este cliente?');">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    Número de clientes: <?= $consulta->rowCount() ?>
    <?php $conexion = null; ?>
</body>

</html>