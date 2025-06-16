<?php

// LOGIN
if (session_status() == PHP_SESSION_NONE) session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'] ?? '';

    if (!empty($usuario)) {
        $_SESSION['usuario'] = $usuario;
        setcookie("ultima_visita", date("Y-m-d H:i:s"), time() + 3600);
        header("Location: bienvenido.php");
        exit;
    }
}
?>

<form method="post">
    Nombre de usuario: <input type="text" name="usuario">
    <button type="submit">Entrar</button>
</form>

--------------------------------------------------------------------------------

<?php
// INDEX
if (session_status() == PHP_SESSION_NONE) session_start();

$usuario = $_SESSION['usuario'] ?? 'Invitado';
echo "<h2>Bienvenido, $usuario</h2>";

if (isset($_COOKIE['ultima_visita'])) {
    echo "Tu última visita fue: " . $_COOKIE['ultima_visita'];
} else {
    echo "¡Es tu primera visita!";
}
