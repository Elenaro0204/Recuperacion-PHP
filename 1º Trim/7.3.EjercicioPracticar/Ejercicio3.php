<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['suma'])) {
    $_SESSION['suma'] = 0;
    $_SESSION['cuentaNumeros'] = 0;
}
if (isset($_REQUEST['n'])) {
    $_SESSION['cuentaNumeros']++;
    $_SESSION['suma'] +=  $_REQUEST['n'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 Sesiones</title>
</head>

<body>
    <h1>Ejercicio 3</h1>
    <p>
        Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras su suma no
        supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado, el contador de los
        números introducidos y la media. Utiliza sesiones.
    </p>
    <?php
    if ($_SESSION['suma'] <= 10000) {
    ?>
        <form action="" method="post">
            <input type="number" name="n" autofocus required="">
            <input type="submit" value="Aceptar">
        </form>
    <?php
    } else {
        echo "<br><br>Ha introducido " . $_SESSION['cuentaNumeros'] . " números.<br>";
        echo "La suma es " . $_SESSION['suma'] . "<br>";
        echo "La media es " . $_SESSION['suma'] / $_SESSION['cuentaNumeros'] . "<br>";
    }
    ?>
</body>

</html>