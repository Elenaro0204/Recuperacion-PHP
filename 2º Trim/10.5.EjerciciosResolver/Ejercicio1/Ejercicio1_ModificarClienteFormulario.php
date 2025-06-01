<?php
if (!isset($_GET['dni'])) {
    die("DNI no proporcionado.");
}

try {
    $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$consulta = $conexion->prepare("SELECT * FROM cliente WHERE dni = ?");
$consulta->execute([$_GET['dni']]);
$cliente = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$cliente) {
    die("Cliente no encontrado.");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar cliente</title>
</head>

<body>
    <h2>Modificar cliente</h2>
    <form action="Ejercicio1_ModificarClienteAccion.php" method="post">
        <input type="hidden" name="dni" value="<?= $cliente['dni'] ?>">
        Nombre: <input type="text" name="nombre" value="<?= $cliente['nombre'] ?>"><br>
        Dirección: <input type="text" name="direccion" value="<?= $cliente['direccion'] ?>"><br>
        Teléfono: <input type="tel" name="telefono" value="<?= $cliente['telefono'] ?>"><br>
        <input type="submit" value="Modificar">
    </form>
</body>

</html>