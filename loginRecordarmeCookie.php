<?php
// LOGIN
if (session_status() == PHP_SESSION_NONE) session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_REQUEST['usuario'] ?? '';
    $recordarme = isset($_REQUEST['recordarme']);

    if (!empty($usuario)) {
        $_SESSION['usuario'] = $usuario;

        // Si marcó "recordarme", se crea cookie por 7 días
        if ($recordarme) {
            setcookie("usuario", $usuario, time() + 7 * 24 * 60 * 60); // 7 días
        }

        header("Location: bienvenido.php");
        exit;
    }
}
?>

<h2>Iniciar sesión</h2>
<form method="post">
    Usuario: <input type="text" name="usuario" required>
    <label><input type="checkbox" name="recordarme"> Recordarme</label><br>
    <button type="submit">Entrar</button>
</form>

---------------------------------------------------------------------------------

<?php
// INDEX
if (session_status() == PHP_SESSION_NONE) session_start();

// Si no hay sesión pero sí cookie, restauramos sesión automáticamente
if (!isset($_SESSION['usuario']) && isset($_COOKIE['usuario'])) {
    $_SESSION['usuario'] = $_COOKIE['usuario'];
}

// Comprobamos si el usuario está en sesión
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    echo "<h2>Bienvenido, $usuario</h2>";
    echo '<a href="logout.php">Cerrar sesión</a>';
} else {
    echo "Debes iniciar sesión. <a href='login.php'>Ir a login</a>";
}
?>

---------------------------------------------------------------------------------

<?php
// LOGOUT
if (session_status() == PHP_SESSION_NONE) session_start();
session_destroy();

// Borramos la cookie (ponemos tiempo pasado)
setcookie("usuario", "", time() - 3600);

header("Location: login.php");
exit;
