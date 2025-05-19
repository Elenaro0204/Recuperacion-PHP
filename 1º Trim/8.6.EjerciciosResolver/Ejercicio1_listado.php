<?php
// Función para leer las mascotas por fecha
function obtenerMascotasPorFecha($fechaBuscada) {
    $mascotasPorFecha = [];

    if (!file_exists('mascotas.txt')) {
        return $mascotasPorFecha;
    }

    $lineas = file('mascotas.txt', FILE_IGNORE_NEW_LINES);
    $enFechaCorrecta = false;

    foreach ($lineas as $linea) {
        if (preg_match('/^#(\d{2}-\d{2}-\d{4})#$/', $linea, $coincidencias)) {
            $fechaActual = $coincidencias[1];
            $enFechaCorrecta = ($fechaActual === $fechaBuscada);
            continue;
        }

        if ($enFechaCorrecta && trim($linea) !== '') {
            $mascotasPorFecha[] = $linea;
        } elseif ($enFechaCorrecta && strpos($linea, "#") === 0) {
            break; // Si empieza otra cabecera de fecha, salimos
        }
    }

    return $mascotasPorFecha;
}

// Si se ha enviado el formulario
$fechaSeleccionada = $_REQUEST['fecha'] ?? '';
$mascotasEncontradas = [];

if ($fechaSeleccionada) {
    // Convertir fecha del input (aaaa-mm-dd) al formato del fichero (dd-mm-aaaa)
    $fechaFormateada = date('d-m-Y', strtotime($fechaSeleccionada));
    $mascotasEncontradas = obtenerMascotasPorFecha($fechaFormateada);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Mascotas por Fecha</title>
</head>
<body>
    <h1>Ver Mascotas Registradas por Fecha</h1>

    <form method="POST" action="">
        <label for="fecha">Selecciona una fecha:</label>
        <input type="date" name="fecha" id="fecha" value="<?php echo htmlspecialchars($_POST['fecha'] ?? ''); ?>" required>
        <input type="submit" value="Ver mascotas">
    </form>

    <?php if ($fechaSeleccionada): ?>
        <h2>Mascotas registradas el <?php echo date('d-m-Y', strtotime($fechaSeleccionada)); ?>:</h2>

        <?php if (!empty($mascotasEncontradas)): ?>
            <table border="1">
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Edad</th>
                </tr>
                <?php foreach ($mascotasEncontradas as $mascota): ?>
                    <?php
                        list($nombre, $tipo, $edad) = explode('-', $mascota);
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($nombre); ?></td>
                        <td><?php echo htmlspecialchars($tipo); ?></td>
                        <td><?php echo htmlspecialchars($edad); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No hay mascotas registradas ese día.</p>
        <?php endif; ?>
    <?php endif; ?>
    <p><a href="Ejercicio1.php">← Volver al registro de mascotas</a></p>

</body>
</html>
