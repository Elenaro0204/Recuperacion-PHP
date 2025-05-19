<?php
if (isset($_REQUEST['color'])) {
    $color = $_REQUEST['color'];
    setcookie("color", $color, strtotime("+3 days"));
} else {
    if (isset($_COOKIE['color'])) {
        $color = $_COOKIE['color'];
    } else {
        $color = "white";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7 Cookies</title>
</head>

<body style="background-color:<?= $color ?>;">
    <h1>Ejercicio 7</h1>
    <p>Escribe un programa que guarde en una cookie el color de fondo (propiedad background-color) de una
        página. Esta página debe tener únicamente algo de texto y un formulario para cambiar el color.</p>

    <p>Elige el color de fondo de la página.</p>
    <form action="" method="post">
        <input type="color" name="color" value="<?= $color ?>"><br><br>
        <input type="submit" value="Aceptar">
    </form>
</body>

</html>