<?php
if (session_status() == PHP_SESSION_NONE) session_start();

// Función para guardar las mascotas en el fichero mascotas.txt
function guardarMascotasEnArchivo($mascotas)
{
    $fechaActual = date('d-m-Y');
    $cabecera = "#{$fechaActual}#\n";
    $nuevasLineas = "";

    foreach ($mascotas as $nombre => $datos) {
        $tipo = $datos['tipo'];
        $edad = $datos['edad'];
        $nuevasLineas .= "{$nombre}-{$tipo}-{$edad}\n";
    }

    $rutaFichero = 'mascotas.txt';

    // Si no existe el archivo, lo creamos con la cabecera y las líneas nuevas
    if (!file_exists($rutaFichero)) {
        file_put_contents($rutaFichero, $cabecera . $nuevasLineas, FILE_APPEND);
    } else {
        $contenidoActual = file_get_contents($rutaFichero);

        // Verificar si ya existe la cabecera con la fecha actual
        if (strpos($contenidoActual, $cabecera) === false) {
            // No existe, la añadimos
            file_put_contents($rutaFichero, $cabecera . $nuevasLineas, FILE_APPEND);
        } else {
            // Existe la cabecera, añadimos solo las nuevas mascotas debajo
            // Para esto, insertamos justo después de esa cabecera
            $lineas = explode("\n", $contenidoActual);
            $nuevoContenido = "";
            $insertado = false;

            foreach ($lineas as $linea) {
                $nuevoContenido .= $linea . "\n";

                if (!$insertado && $linea === trim($cabecera)) {
                    $nuevoContenido .= $nuevasLineas;
                    $insertado = true;
                }
            }

            file_put_contents($rutaFichero, $nuevoContenido);
        }
    }

    // Limpiar las mascotas de la sesión
    unset($_SESSION['mascotas']);
}

// Procesar el envío del formulario para añadir mascotas
if (isset($_REQUEST['nombre'], $_REQUEST['tipo'], $_REQUEST['edad'])) {
    $nombre = htmlspecialchars($_REQUEST['nombre']);
    $tipo = htmlspecialchars($_REQUEST['tipo']);
    $edad = htmlspecialchars($_REQUEST['edad']);

    // Validación simple (puedes agregar más validaciones según necesites)
    if (!empty($nombre) && !empty($tipo) && is_numeric($edad)) {
        $mascota = ['tipo' => $tipo, 'edad' => $edad];
        $_SESSION['mascotas'][$nombre] = $mascota;
    }
}

// Si se hace clic en el botón de guardar mascotas
if (isset($_REQUEST['guardar'])) {
    if (!empty($_SESSION['mascotas'])) {
        guardarMascotasEnArchivo($_SESSION['mascotas']);
        // Limpiar las mascotas de la sesión después de guardarlas
        $_SESSION['mascotas'] = [];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Fichero</title>
</head>

<body>
    <h1>Ejercicio 1</h1>
    <p>Crear una aplicación web para mantener un fichero mascotas.txt de los animales inscritos diariamente
        en una clínica veterinaria, con la siguiente estructura:</p>
    <p>#02-03-2019#</p>
    <p>pepe-canario-2</p>
    <p>luna-perro-4</p>
    <p>duque-gato-6</p>
    <p>#15-11-2019#</p>
    <p>princesa-hamster-1</p>
    <p>venus-perro-12</p>
    <p>...</p>
    <p>Al entrar en la aplicación, la fecha seleccionada automáticamente es la fecha actual, por lo que las
        mascotas son grabadas forzosamente en el día en que nos encontramos.</p>
    <p>Crear una página para añadir mascotas en un array de sesión donde la clave es el nombre de la mascota
        y el valor es otro array con los datos correspondientes al tipo de animal y su edad. Las mascotas que se
        van añadiendo se van mostrando en una tabla.</p>
    <p>Incluir un formulario para añadir los datos de una nueva mascota.</p>
    <p>Incluir un botón para grabar todas las mascotas añadidas en el fichero mascotas.txt, con la cabecera de
        la fecha actual tal como se ve en el ejemplo (el fichero debe mantener la información previa y añadir las
        líneas de las mascotas nuevas al final del mismo), limpiando la tabla de mascotas añadidas hasta ese
        momento. Si no se han añadido mascotas previamente ese mismo día habrá que incluir la cabecera con
        la fecha actual, pero en caso contrario solo hay que añadir las mascotas al final, sin duplicar la cabecera.</p>

    <h2>Clínica Veterinaria - Gestión de Mascotas</h2>

    <h3>Añadir Nueva Mascota</h3>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" required><br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required><br><br>

        <input type="submit" value="Añadir Mascota">
    </form>

    <h3>Mascotas Añadidas</h3>
    <?php if (!empty($_SESSION['mascotas'])): ?>
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Edad</th>
            </tr>
            <?php foreach ($_SESSION['mascotas'] as $nombre => $datos): ?>
                <tr>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $datos['tipo']; ?></td>
                    <td><?php echo $datos['edad']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <form method="POST" action="">
            <input type="submit" name="guardar" value="Guardar en fichero mascotas.txt">
        </form>
    <?php else: ?>
        <p>No se han añadido mascotas.</p>
    <?php endif; ?>
    <p><a href="Ejercicio1_listado.php">Ver mascotas por fecha</a></p>
</body>

</html>