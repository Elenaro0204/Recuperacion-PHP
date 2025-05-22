<?php
// Iniciamos sesión
if (session_status() == PHP_SESSION_NONE) session_start();

define("FICHERO_USUARIOS", "usuarios.dat");

// Volver al login
if (isset($_REQUEST["volver"])) {
    header("Location: login.php");
    exit();
}

$mensaje = "";

// Si se ha enviado el formulario
if (isset($_REQUEST["registrar"])) {
    $usuario = trim($_REQUEST["usuario"] ?? "");
    $clave = trim($_REQUEST["clave"] ?? "");

    if ($usuario !== "" && $clave !== "") {
        // Codificamos la contraseña
        $claveCifrada = password_hash($clave, PASSWORD_DEFAULT);
        $linea = $usuario . ":" . $claveCifrada . PHP_EOL;

        // Guardamos en el fichero
        file_put_contents(FICHERO_USUARIOS, $linea, FILE_APPEND);

        $mensaje = "<p style='color:green;'>Usuario registrado correctamente. <a href='login.php'>Iniciar sesión</a></p>";
    } else {
        $mensaje = "<p style='color:red;'>Debes rellenar todos los campos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>

<body>
    <h1>Registro de Usuario</h1>

    <?= $mensaje ?>

    <form method="POST" action="">
        <label>Usuario:</label>
        <input type="text" name="usuario" required><br><br>

        <label>Contraseña:</label>
        <input type="password" name="clave" required><br><br>

        <input type="submit" name="registrar" value="Registrarse">
    </form>

    <form method="POST" action="">
        <input type="submit" name="volver" value="Volver al login">
    </form>

    <h3>Contenido actual del fichero de usuarios:</h3>
    <pre>
<?php
if (file_exists(FICHERO_USUARIOS)) {
    echo htmlspecialchars(file_get_contents(FICHERO_USUARIOS));
} else {
    echo "El fichero aún no existe.";
}
?>
    </pre>
</body>

</html>