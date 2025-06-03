<?php 
// Incluyo la clase Viaje
include_once "Viaje.php";

// Defino la constante del fichero
$fichero = "viajes.txt";

// Inicio la session
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['filtar']) && isset($_REQUEST['destino'])) {
    $destinoFiltrado = trim(strtolower($_REQUEST['destino']));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda - Elena Rengel Olivares</title>
</head>
<body>
    <!-- Formulario para buscar el destino -->
    <form method="POST" action="">
        <label for="destino">Destino:</label><br>
        <input type="text" name="destino" placeholder="Introduce el destino" required><br>

        <input type="submit" name="filtrar" value="Filtrar">
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

                if ($destino === $destinoFiltrado){
                    // Añado la informacion a la tabla
                    echo "<tr>";
                    echo "<td>$destino</td>";
                    echo "<td>$precio €</td>";

                    echo "<td>$fecha";
                    // if ($fechaInminente){
                    // echo '<td style="color: red;">Viaje Inminente</td>';
                    // };
                    echo"</td>";

                    echo "</tr>";
                };

            }

            echo "</table>";
        } else {
            echo "<h3 style='color: red;'>No hay viajes registrados.</h3>";
        }
    ?>
</body>
</html>