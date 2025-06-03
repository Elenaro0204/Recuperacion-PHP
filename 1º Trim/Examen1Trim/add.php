<?php
// Para los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluyo la clase Viaje
include_once "Viaje.php";

// Defino la constante del fichero
$fichero = "viajes.txt";

// Compruebo si existe la sesion
if (!isset($_SESSION['Viaje'])) {
    if (isset($_COOKIE['viajes'])) {
        $_SESSION['Viaje'] = $_COOKIE['viajes'];
    }else{
        $_SESSION['Viaje'] = [];

        $fp = fopen($fichero, "r");
        fgets($fp); // Lee la primera línea (si es que tiene encabezado)
        while (!feof($fp)) {
            $linea = fgets($fp);
            if (strlen($linea) > 1) {
                $_SESSION['Viaje'][] = $linea; // Añade el viaje a la sesión
            }
        }
        fclose($fp);
    }
} else{
    $_SESSION['Viaje'] = $_SESSION['Viaje'];
}

// Inicio la session
if (session_status() == PHP_SESSION_NONE) session_start();

// Navega hasta la pantalla de inicio y destruye la sesion
if (isset($_REQUEST['cerrar'])) {
    setcookie("viaje", "NULL", -1);
    header("Location: index.php");
}

// Añadir nuevo viaje
if (isset($_REQUEST['guardar'])) {
    if (isset($_REQUEST['destino']) && isset($_REQUEST['precio']) && isset($_REQUEST['fecha'])) {
        $destino = trim(strtolower($_REQUEST['destino']));
        $precio = floatval($_REQUEST['precio']);
        $fecha = date("d-m-Y", strtotime($_REQUEST['fecha']));

        // Creo el nuevo viaje
        $nuevoViaje = new Viaje($destino, $precio, $fecha);

        // Verifico si ya existe el array de Viajes en la sesión
        if (!isset($_SESSION['Viaje'])) {
            $_SESSION['Viaje'] = [];
        }

        // Serializo el Viaje para añadirlo al array de sesion
        $nuevoViajeSerializado = base64_encode(serialize($nuevoViaje));

        // Añado el nuevo Viaje al array de session Viajes
        $_SESSION['Viaje'][] = $nuevoViajeSerializado;

        // Añado el nuevo contenido al archivo
        $contenido = '';

        foreach ($_SESSION['Viaje'] as $viajesSerializado) {
            $viaje = unserialize(base64_decode($viajesSerializado));
            $destino = $viaje->getDestino();
            $precio = $viaje->getPrecio();
            $fecha = $viaje->getFecha();

            $contenido .= "$destino, $precio, $fecha" . PHP_EOL;
        }

        // Escribimos en el fichero
        file_put_contents($fichero, $contenido);

        setcookie("viajes", base64_encode(serialize($_SESSION['Viaje'])), time() + 3 * 24 * 3600);

    } else {
        echo "<p style='color:red;'>Error: datos incompletos.</p>";
    }
}

// Retrasar 1 mes
if (isset($_POST['retrasar']) && isset($_POST['indiceRetrasar'])) {
    $indice = $_POST['indiceRetrasar'];

    if (isset($_SESSION['Viaje'][$indice])) {
        $viaje = unserialize(base64_decode($_SESSION['Viaje'][$indice]));
        //var_dump($viaje); // Comprueba si es objeto válido

        $nuevaFecha = Viaje::retrasarMes($viaje->getFecha());
        $viaje->setFecha($nuevaFecha);

        $_SESSION['Viaje'][$indice] = base64_encode(serialize($viaje));

        echo "<p style='color: green;'>El viaje {$viaje->getDestino()} se actualizado a {$nuevaFecha} €.</p>";
    } else {
        echo "Viaje no encontrado en sesión.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add - Elena Rengel Olivares</title>
</head>
<body>
    <h1>Agencia de Viaje</h1>

    <h2>Panel de Administrador Activo - Total de ventas en viajes: <?php $total = Viaje::getTotalVentas()?> €</h2>

    <!-- Boton para cerrar la sesion -->
    <form method="POST" action="">
        <input type="submit" name="cerrar" value="Cerrar panel de Administrador">
    </form>

    <!-- Formulario para crear viajes -->
    <h2>Crear nuevo viaje</h2>
    <form method="POST" action="">
        <label for="destino">Destino:</label><br>
        <input type="text" name="destino" required><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" name="precio" required><br><br>

        <label for="fecha">Fecha:</label><br>
        <input type="date" name="fecha" required><br><br>

        <input type="submit" name="guardar" value="Añadir Viaje">
    </form>

    <h2>Mostrar viajes programados</h2>

    <?php
    // Compruebo que la sesion Viaje no esta vacia
    if (!empty($_SESSION['Viaje'])) {
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><th>Destino</th><th>Precio</th><th>Fecha</th><th>Acción</th></tr>";

        foreach ($_SESSION['Viaje'] as $viajesSerializado) {
            $viaje = unserialize(base64_decode($viajesSerializado));
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

            ?>
             <td>
                <form method='POST' action=''>
                    <input type='hidden' name='indiceRetrasar' value='<?php echo $i; ?>'>
                    <input type='submit' name='restrasar' value='Retrasar 1 mes'>
                </form>
            </td> 
            <?php

            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<h3 style='color: red;'>No hay viajes registrados.</h3>";
    }
    ?>
</body>
</html>