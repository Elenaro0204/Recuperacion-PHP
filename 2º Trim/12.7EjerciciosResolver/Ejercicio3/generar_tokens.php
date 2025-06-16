<?php
$conexion = new mysqli("localhost", "root", "toor", "tienda3");

if ($conexion->connect_error) {
    die("Error al conectar: " . $conexion->connect_error);
}

$usuarios = $conexion->query("SELECT id, nombre FROM usuario");

while ($usuario = $usuarios->fetch_assoc()) {
    $id = $usuario['id'];
    $nombre = $usuario['nombre'];
    $token = bin2hex(random_bytes(16)); // genera token aleatorio de 32 caracteres

    $stmt = $conexion->prepare("UPDATE usuario SET token = ?, peticiones = 0 WHERE id = ?");
    $stmt->bind_param("si", $token, $id);
    $stmt->execute();

    echo "Token generado para {$nombre}: $token\n";
}

$conexion->close();
?>
