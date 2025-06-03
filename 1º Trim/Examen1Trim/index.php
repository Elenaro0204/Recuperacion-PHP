<?php 
// Para los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluyo la clase Viaje
include_once "Viaje.php";

// Defino la constante del fichero
$fichero = "viajes.txt";

// Inicio la session
if (session_status() == PHP_SESSION_NONE) session_start();

// Compruebo si existe la sesion
if (!isset($_SESSION['Viaje'])) {
    if (isset($_COOKIE['viajes'])) {
        $_SESSION['Viaje'] = $_COOKIE['viajes'];
    }else{
        $_SESSION['Viaje'] = [];
    }
}

// Navega hasta la pantalla del administrador
if (isset($_REQUEST['administrar'])) {
    header("Location: administrador.php");
}

// Navega hasta la pantalla del administrador
if (isset($_REQUEST['buscar'])) {
    header("Location: busqueda.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - Elena Rengel Olivares</title>
</head>
<body>
    <h1>Agencia de Viaje</h1>

    <form method="POST" action="">
        <input type="submit" name="administrar" value="Administrar">
    </form>

    <?php
    // Compruebo que la sesion Viaje no esta vacia
    if (!empty($_SESSION['Viaje'])) {
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><th>Destino</th><th>Precio</th><th>Fecha</th></tr>";

        foreach ($_SESSION['Viaje'] as $i => $viajeSerializado) {
            $viaje = unserialize(base64_decode($viajeSerializado));
            $destino = $viaje->getDestino();
            $precio = $viaje->getPrecio();
            $fecha = $viaje->getFecha();
            // $fechaInminente = $viaje->inminente($fecha);

            // Añado la informacion a la tabla
            echo "<tr>";
            echo "<td>$destino</td>";
            echo "<td>$precio €</td>";

            echo "<td>$fecha";
            // if ($fechaInminente){
            //   echo '<td style="color: red;">Viaje Inminente</td>';
            // };
            echo"</td>";

            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<h3 style='color: red;'>No hay viajes registrados.</h3>";
    }
    ?>

    <form method="POST" action="">
        <input type="submit" name="buscar" value="Buscar viajes">
    </form>
</body>
</html>