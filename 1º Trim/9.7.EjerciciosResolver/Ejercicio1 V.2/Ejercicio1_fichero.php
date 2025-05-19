<?php
// Incluyo la clase Empleado
include_once 'Empleado.php';

// Inicio la sesion
if (session_status() == PHP_SESSION_NONE) session_start();

// Constante para el nombre del fichero
define("FICHERO", "empleados.txt");

// Volver a la pantalla de inicio
if (isset($_REQUEST['volver'])) {
    header("Location: Ejercicio1.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Objetos V2</title>
</head>

<body>
    <h1>Ejercicio 1 V.2</h1>

    <h2>Volcar Empleados al Fichero:</h2>

    <?php
    $fichero = 'empleados.txt';

    if (!empty($_SESSION['empleados'])) {
        $contenido = '';

        foreach ($_SESSION['empleados'] as $empleadoSerializado) {
            $empleado = unserialize(base64_decode($empleadoSerializado));
            $nombre = $empleado->getNombre();
            $sueldo = $empleado->getSueldo();
            $pagaImpuestos = $empleado->imprimirMensajeImpuestos();

            $contenido .= "Nombre: $nombre | Sueldo: $sueldo € | $pagaImpuestos" . PHP_EOL;
        }

        // Escribimos en el fichero
        file_put_contents($fichero, $contenido);

        echo "<p style='color: green;'>Los empleados se han volcado correctamente en el fichero <strong>$fichero</strong>.</p>";

        // Mostramos el contenido directamente en pantalla
        echo "<h3>Contenido del fichero:</h3>";
        echo "<pre>" . htmlspecialchars($contenido) . "</pre>";
    } else {
        echo "<p style='color: red;'>No hay empleados registrados en la sesión.</p>";
    }
    ?>

    <form method="POST" action="">
        <input type="submit" name="volver" value="Volver al inicio">
    </form>
</body>

</html>