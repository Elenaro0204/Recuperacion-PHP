<?php
if (session_status() == PHP_SESSION_NONE) session_start();

// Comprobamos si ya hay una sesión iniciada
if (isset($_SESSION['usuario'])) {
    header("Location: principal.php");
}

// Función para verificar el usuario y contraseña en el fichero 'usuarios.dat'
function verificarCredenciales($usuario, $contrasena)
{
    $usuarios = file("usuarios.dat", FILE_IGNORE_NEW_LINES);
    foreach ($usuarios as $linea) {
        list($user, $pass) = explode(":", $linea); // CORREGIDO: antes ponía ","
        if ($user === $usuario && password_verify($contrasena, trim($pass))) {
            return true;
        }
    }
    return false;
}

// Procesar el inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_REQUEST['usuario'];
    $contrasena = $_REQUEST['contrasena'];

    if (verificarCredenciales($usuario, $contrasena)) {
        $_SESSION['usuario'] = $usuario;

        // Recordar contraseña en cookie por un mes si está marcado
        if (isset($_REQUEST['recordar']) && $_REQUEST['recordar'] == 'recordar') {
            setcookie("usuario", $usuario, time() + 30 * 24 * 3600); // Cookie válida por 30 días
            setcookie("contrasena", $contrasena, time() + 30 * 24 * 3600); // Cookie válida por 30 días
        } else {
            setcookie("usuario", "", time() - 3600); // Eliminar cookie de usuario
            setcookie("contrasena", "", time() - 3600); // Eliminar cookie de contraseña
        }

        header("Location: index.php");
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="usuario">Usuario:</label><br>
        <input type="text" name="usuario" value="<?php echo isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : ''; ?>"><br>
        
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" name="contrasena"><br>

        <input type="checkbox" name="recordar" value="recordar"> Recordar contraseña<br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <br>
    <a href="registro.php">Registrarse</a>
</body>

</html>