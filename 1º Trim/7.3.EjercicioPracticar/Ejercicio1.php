<?php
// Inicio la sesion
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
    $_SESSION['cuentaNumeros'] = 0;
}
if (isset($_REQUEST['n']) &&  $_REQUEST['n'] > 0) {
    $_SESSION['cuentaNumeros']++;
    $_SESSION['total'] +=  $_REQUEST['n'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Sesiones</title>
</head>

<body>
    <h1>Ejercicio 1</h1>
    <p>Escribe un programa que calcule la media de un conjunto de números positivos introducidos por teclado. A
        priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha terminado de introducir
        los datos cuando meta un número negativo. Utiliza sesiones.</p>

    <?php
    if (isset($_REQUEST['n']) && $_REQUEST['n'] < 0) {
    ?>
        <p>
            La media de los números introducidos es <?php echo $_SESSION['total'] / ($_SESSION['cuentaNumeros']); ?>
        </p>
    <?php
    } else {
    ?>
        <form action="" method="post">
            <input type="number" name="n" autofocus>
            <input type="submit" value="Aceptar">
        </form>
    <?php
    }
    ?>
</body>

</html>