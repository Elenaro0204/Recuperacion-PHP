<?php
// Si se envían datos desde el formulario de actores, 
// se actualizan las cookies 
if (isset($_POST["actriz"])) {
    $actriz = $_POST["actriz"];
    $actor = $_POST["actor"];
    setcookie("actriz", $actriz, time() + 3 * 24 * 3600);
    setcookie("actor", $actor, time() + 3 * 24 * 3600);
} else if (isset($_COOKIE["actriz"])) {
    $actriz = $_COOKIE["actriz"];
    $actor = $_COOKIE["actor"];
}
// Borrado de cookies y variables 
if (isset($_POST["borraCookies"])) {
    // Lo que se escriba en el NULL da igual, lo importante es que tenga el -1 para que se borren
    setcookie("actriz", "NULL", -1);
    setcookie("actor", "NULL", -1);
    // unset($actriz);
    // unset($actor);
    header('refresh:0');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ejemplo Cookies</title>
    <style>
        .red {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    if (!isset($actriz)) {
        echo "<p class='red'>No has elegido todavía a tus actores favoritos.</p>";
        echo "<p>Utiliza el siguiente formulario para hacerlo.</p>";
    } else {
        echo "<h2>Actriz favorita: " . $actriz . "</h2>";
        echo "<h2>Actor favorito: " . $actor . "</h2>";
        echo "<p class='red'>Introduce nuevos nombres si quieres cambiar tus preferencias.</p>";
    }
    ?>
    <form action="#" method="post">
        <label for="actriz">Actriz:</label>
        <input type="text" name="actriz">
        <br>
        <label for="actor">Actor:</label>
        <input type="text" name="actor">
        <br>
        <input type="submit" value="Aceptar">
    </form>
    <hr>
    <form action="#" method="post">
        <input type="hidden" name="borraCookies" value="si">
        <input type="submit" value="Borrar cookies">
    </form>
</body>

</html>