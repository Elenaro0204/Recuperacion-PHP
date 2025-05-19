<?php
if (session_status() == PHP_SESSION_NONE) session_start();
//Si se recibe el parámetro cerrar, destruimos la sesion y refrescamos
if (isset($_REQUEST['cerrar'])) {
    session_destroy();
    header("Refresh: 0");
}
// Formulario de login
// Comprueba nombre de usuario y contraseña
if (isset($_REQUEST['usuario'])) {
    if (($_REQUEST['usuario'] == "elena") && ($_REQUEST['contrasena'] == "1234")) {
        $_SESSION['user'] = $_REQUEST['usuario'];
        header("location: Ejercicio4.php"); // redirige a la página del ejercicio1
    } else {
        echo '<span style="color: red">Contraseña incorrecta. Inténtelo de nuevo.</span><br><br>';
        //header("Refresh: 3; url=pagina.php?ejercicio=04"); // recarga la página
    }
} elseif (isset($_SESSION['user'])) {
    header('location: Ejercicio4.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 Sesiones</title>
</head>

<body>
    <h1>Ejercicio 4</h1>
    <p>Establece un control de acceso mediante nombre de usuario y contraseña para el ejercicio 1 de esta relación.
        Realiza una nueva versión del ejercicio1, de modo que si lo cargamos sin la sesión iniciada nos redirija a la
        página de login, y en caso contrario muestre el ejercicio normalmente, también debemos incluir un botón
        “cerrar sesión” para cerrar la sesión del usuario y volver a la página de login.
        Al cargar la página de login, si la sesión está iniciada redirige automáticamente a la página del ejercicio1 y si
        no, mostrará el formulario de identificación con usuario y contraseña.</p>

    <form action="" method="post">
        <input type="hidden" name="ejercicio" value="04">
        Usuario: <input type="text" name="usuario" autofocus><br>
        Contraseña: <input type="password" name="contrasena"><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>

</html>