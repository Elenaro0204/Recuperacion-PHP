<?php
if (session_status() == PHP_SESSION_NONE) session_start(); // Inicio de sesión
 
if (isset($_SESSION['visitas'])) {
    $_SESSION['visitas']++;
} else {
    $_SESSION['visitas'] = 1;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ejemplo Session Start</title>
</head>

<body>
    <?php
    echo "Visitas: " . $_SESSION['visitas']; // Son las recargas que hace el usuario
    ?>
</body>

</html>