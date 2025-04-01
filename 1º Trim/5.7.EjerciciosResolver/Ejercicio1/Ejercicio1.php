<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Arrays</title>
    <style>
        table {
            border-collapse: collapse;
            margin: auto;
        }

        td {
            width: 60px;
            height: 60px;
            text-align: center;
            padding: 0;
        }

        img {
            width: 50px;
            height: 50px;
        }

        .general {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Ejercicio 1</h1>
    <p>Diseñar una página que esté compuesta por una tabla de 10 filas por 10 columnas, y en cada
        celda habrá una imagen de un ojo cerrado. Cada vez que el usuario pulse un ojo, ser recargará
        la página con todos los ojos cerrados salvo los que se han ido pulsando que corresponderá a un
        ojo abierto. Conforme se vallan pulsando más ojos se irá completando la tabla de ojos abiertos.
        Si se pulsa en un ojo abierto se volverá a cerrar. Usar la función explode() para pasar arrays
        como cadenas.</p>

    <?php
    // Definimos las dimensiones de la tabla
    $filas = 10;
    $columnas = 10;
    $totalCeldas = $filas * $columnas; // Definir el total de celdas

    // Inicializa el array de ojos (todos cerrados)
    if (isset($_GET['ojos'])) {
        // Convertimos la cadena de la URL en un array
        $ojos = explode(',', $_GET['ojos']);

        // Asegurarnos de que el array tiene el tamaño correcto
        if (count($ojos) != $totalCeldas) {
            $ojos = array_fill(0, $totalCeldas, 0);
        }
    } else {
        // Si no hay valores en la URL, inicializar todos a cerrados
        $ojos = array_fill(0, $totalCeldas, 0);
    }

    // Verificar si se ha pulsado un ojo
    if (isset($_GET['seleccion'])) {
        $sel = (int)$_GET['seleccion'];

        // Asegurar que la selección está dentro de los límites
        if ($sel >= 0 && $sel < $totalCeldas) {
            // Cambiar el estado del ojo (abierto/cerrado)
            $ojos[$sel] = ($ojos[$sel] == 0) ? 1 : 0;
        }
    }

    // Convertimos el array de nuevo en cadena para la URL
    $cadena = implode(',', $ojos);
    ?>

    <table>
        <?php
        $contador = 0;
        for ($i = 0; $i < $filas; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $columnas; $j++) {
                echo '<td>';
                echo '<a href="?seleccion=' . $contador . '&ojos=' . $cadena . '">';

                // Determinar la imagen según el estado de la celda
                $imagen = ($ojos[$contador] == 1) ? "ojo_abierto.jfif" : "ojo_cerrado.jpg";
                echo '<img src="img/' . $imagen . '" alt="Ojo">';

                echo '</a>';
                echo '</td>';
                $contador++;
            }
            echo '</tr>';
        }
        ?>
    </table>

    <!-- Botón para reiniciar -->
    <p style="text-align:center;">
        <a href="Ejercicio1.php"><button>Reiniciar Tabla</button></a>
    </p>

</body>

</html>