<?php
// Iniiar la sesion
if (session_status() == PHP_SESSION_NONE) session_start();

// Si ya hay sesión activa, redirigir a la página principal\
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
}

// Si se ha enviado el formulario de login
$mensaje = "";
if (isset($_REQUEST['inicio']) && isset($_REQUEST['usuario']) && isset($_REQUEST['contrasena'])) {
    $usuario = $_REQUEST['usuario'] ?? '';
    $contrasena = $_REQUEST['contrasena'] ?? '';
    $recordar = isset($_REQUEST['recordar']);

    // Leer usuarios del fichero
    $lineas = file('usuarios.dat', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $autenticado = false;

    foreach ($lineas as $linea) {
        list($u, $c) = explode('|', $linea);
        if ($usuario === $u && $contrasena === $c) {
            $autenticado = true;
        }
    }

    if ($autenticado) {
        $_SESSION['usuario'] = $usuario;

        if ($recordar) {
            setcookie('usuario', $usuario, time() + 30 * 24 * 60 * 60);
            setcookie('contrasena', $contrasena, time() + 30 * 24 * 60 * 60);
        } else {
            setcookie('usuario', '', time() - 3600);
            setcookie('contrasena', '', time() - 3600);
        }

        header("Location: index.php");
        exit;
    } else {
        $mensaje = "Usuario o contraseña incorrectos.";
    }
}

$usuarioGuardado = $_COOKIE['usuario'] ?? '';
$contrasenaGuardada = $_COOKIE['contrasena'] ?? '';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulacro - Login</title>
</head>

<body>
    <h1>Iniciar sesión</h1>
    
    <form method="post">
        <label>Usuario:</label>
        <input type="text" name="usuario" value="<?= htmlspecialchars($usuarioGuardado) ?>" required><br>
        
        <label>Contraseña:</label>
        <input type="password" name="contrasena" value="<?= htmlspecialchars($contrasenaGuardada) ?>" required><br>
        
        <label><input type="checkbox" name="recordar" <?= $usuarioGuardado ? 'checked' : '' ?>> Recordar contraseña</label><br><br>
        
        <input type="submit" name="inicio" value="Iniciar sesión">
    </form>

    <p style="color:red;"><?= $mensaje ?></p>

    <form action="registro.php">
        <input type="submit" value="Registrarse">
    </form>
</body>

</html>