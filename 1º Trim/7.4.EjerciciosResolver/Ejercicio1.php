<?php
// Inicio de sesión
if (session_status() == PHP_SESSION_NONE) session_start();

// Si no existe el array de colores en sesión, lo inicializamos
if (!isset($_SESSION['paleta'])) {
    $_SESSION['paleta'] = [];
}

// Manejar el botón "Añadir color"
if (isset($_POST['addColor'])) {
    // Generar color aleatorio directamente sin función
    $colorNuevo = '#' . str_pad(dechex(rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    $_SESSION['paleta'][] = $colorNuevo;
    $_SESSION['background'] = $colorNuevo;
}

// Botón "Destruir sesión y generar nueva paleta"
if (isset($_POST['destroySession'])) {
    session_unset(); // Limpiar todas las variables de sesión
    session_destroy(); // Destruir la sesión
    session_start(); // Iniciar nueva sesión
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Sesiones</title>
</head>

<body style="background-color: <?php echo isset($_SESSION['background']) ? $_SESSION['background'] : '#FFFFFF'; ?>;">
    <h1>Ejercicio 1:</h1>
    <p>Haz clic en el botón para añadir colores aleatorios a la paleta y cambiar el fondo de la página.</p>

    <form action="" method="post">
        <input type="submit" name="addColor" value="Añadir color">
    </form>

    <form action="Ejercicio1Paleta.php" method="post">
        <input type="submit" value="Mostrar paleta creada">
    </form>

    <form action="" method="post">
        <input type="submit" name="destroySession" value="Destruir sesión y generar nueva paleta">
    </form>
</body>

</html>
