<?php
if (!isset($_GET['dni'])) {
    die("DNI no proporcionado.");
}

try {
    $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$dni = $_GET['dni'];
$consulta = $conexion->prepare("DELETE FROM cliente WHERE dni = ?");
$consulta->execute([$dni]);

echo "Cliente eliminado correctamente.<br>";
echo "<a href='Ejercicio1_Index.php'>Volver al listado</a>";

$conexion = null;
