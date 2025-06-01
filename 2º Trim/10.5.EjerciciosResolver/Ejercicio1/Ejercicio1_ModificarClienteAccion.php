<?php
if (!isset($_POST['dni'])) {
    die("Faltan datos.");
}

try {
    $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$consulta = $conexion->prepare("UPDATE cliente SET nombre = ?, direccion = ?, telefono = ? WHERE dni = ?");
$consulta->execute([
    $_POST['nombre'],
    $_POST['direccion'],
    $_POST['telefono'],
    $_POST['dni']
]);

echo "Cliente modificado correctamente.<br>";
echo "<a href='Ejercicio1_Index.php'>Volver al listado</a>";

$conexion = null;
