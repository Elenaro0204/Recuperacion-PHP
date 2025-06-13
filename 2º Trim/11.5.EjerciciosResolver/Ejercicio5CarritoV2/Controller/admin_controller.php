<?php
session_start();

// Comprobar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    // No está logueado, redirigir al login
    header("Location: login.php");
    exit();
}

// Comprobar si el usuario es admin
if ($_SESSION['usuario']['rol'] !== 'admin') {
    // No es admin, redirigir a página de acceso denegado o al index cliente
    header("Location: acceso_denegado.php"); // o index.php con vista cliente
    exit();
}

// Si llegamos aquí, el usuario es admin y puede ver la vista
?>
