<?php
// Compruebo que se ha iniciado session
if (session_status() == PHP_SESSION_NONE) session_start();

// Compruebo que se ha recibido la session
if (!isset($_SESSION["actrices"]) && !isset($_SESSION["actores"])) {

    // Compruebo que se a recibido la cookie
    if (isset($_COOKIE['actrices'])) {
        // base64_decode sirve para decodificarlo
        $_SESSION["actrices"] = unserialize(base64_decode($_COOKIE['actrices']));
        $_SESSION["actores"] = unserialize(base64_decode($_COOKIE['actores']));
    } else {
        $_SESSION["actrices"] = [];
        $_SESSION["actores"] = [];
    }
}

// Si se envían datos desde el formulario de actores, 
// se actualizan las cookies 
if (isset($_POST["actriz"])) {

    // Recojo los datos del formulario
    $actriz = $_POST["actriz"];
    $actor = $_POST["actor"];

    // Añado el valor nuevo en el array "actrices" y "actores"
    $_SESSION['actrices'][] = $actriz;
    $_SESSION['actores'][] = $actor;

    // Añado la cookie con los valores nuevos
    // base64_encode sirve para codificarlo
    setcookie("actrices", base64_encode(serialize($_SESSION['actrices'])), time() + 3 * 24 * 3600);
    setcookie("actores", base64_encode(serialize($_SESSION['actores'])), time() + 3 * 24 * 3600);
}

// Borrado de cookies y variables 
if (isset($_POST["borraCookies"])) {
    // Lo que se escriba en el NULL da igual, lo importante es que tenga el -1 para que se borren
    setcookie("actrices", "", -1);
    setcookie("actores", "", -1);
    session_destroy();
    // unset($actriz);
    // unset($actor);
    header('refresh:0');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ejemplo Cookies con Arrays</title>
    <style>
        .red {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    if (count($_SESSION['actrices']) == 0) {
        echo "<p class='red'>No has elegido todavía a tus actores favoritos.</p>";
        echo "<p>Utiliza el siguiente formulario para hacerlo.</p>";
    } else {
        // Recorro el array que se forma al introducir los datos
        foreach ($_SESSION['actrices'] as $i => $valor) {
            echo"<h1>" . $i . "</h1>";
            // echo "<h2>Actriz favorita: " . $valor . "</h2>"; Otra opción pero no se puede hacer con actor porque el array que estoy recorriendo es el de actrices
            echo "<h2>Actriz favorita: " . $_SESSION['actrices'][$i] . "</h2>";
            echo "<h2>Actor favorito: " . $_SESSION['actores'][$i] . "</h2>";
        }
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