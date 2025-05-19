<?php
// Iniciar sesión
session_start();

// Si ya hay una sesión activa, redirigir a la página principal
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Si se ha enviado el formulario de registro
if (isset($_REQUEST['inicio']) && isset($_REQUEST["usuario"]) && isset($_REQUEST["contrasena"])) {
    $usuario = trim($_REQUEST["usuario"]);
    $contrasena = trim($_REQUEST["contrasena"]);

    // Validaciones básicas
    if ($usuario === "" || $contrasena === "") {
        $mensaje = "Por favor, rellena todos los campos.";
    } else {
        $rutaFichero = "usuarios.dat";

        // Comprobar si el usuario ya existe
        if (file_exists($rutaFichero)) {
            $lineas = file($rutaFichero, FILE_IGNORE_NEW_LINES);
            foreach ($lineas as $linea) {
                list($u, $c) = explode(":", $linea);
                if ($u === $usuario) {
                    $mensaje = "El usuario ya está registrado.";
                }
            }
        }

        // Si no hay errores, guardar el nuevo usuario
        if (!isset($mensaje)) {
            $nuevoUsuario = $usuario . ":" . password_hash($contrasena, PASSWORD_DEFAULT) . PHP_EOL;
            file_put_contents($rutaFichero, $nuevoUsuario, FILE_APPEND);
            header("Location: login.php?registrado=1");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulacro - Registro</title>
</head>
<body>
    <h2>Registrarse</h2>

    <?php if (isset($mensaje)) echo "<p style='color:red;'>$mensaje</p>"; ?>

    <form method="post" action="">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>

        <input type="submit" value="Registrar">
    </form>

    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
</body>
</html>
