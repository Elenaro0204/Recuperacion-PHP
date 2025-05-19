<?php
// Muestra el mensaje de error
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Incluyo la clase Empleado
include_once 'Empleado.php';

// Inicio la sesión
if (session_status() == PHP_SESSION_NONE) session_start();

// Si venimos del botón Modificar
if (isset($_SESSION['indiceModificar'])) {
    $indice = $_SESSION['indiceModificar'];

    if (isset($_SESSION['empleados'][$indice])) {
        $empleadoSerializado = $_SESSION['empleados'][$indice];
        $empleado = unserialize(base64_decode($empleadoSerializado));

        $nombre = $empleado->getNombre();
        $sueldo = $empleado->getSueldo();
    } else {
        echo "<p style='color: red;'>No se encontró el empleado.</p>";
    }
}

// Si ya se ha enviado el formulario de modificación
if (isset($_REQUEST['guardar'])) {
    if (isset($_SESSION['indiceModificar']) && isset($_REQUEST['nombre']) && isset($_REQUEST['sueldo'])) {
        $indice = $_SESSION['indiceModificar'];
        $nombre = trim($_REQUEST['nombre']);
        $sueldo = floatval($_REQUEST['sueldo']);

        $empleado = new Empleado($nombre, $sueldo);
        $_SESSION['empleados'][$indice] = base64_encode(serialize($empleado));

        unset($_SESSION['indiceModificar']);
        header("Location: Ejercicio1_listado.php");
    } else {
        echo "<p style='color:red;'>Error: datos incompletos.</p>";
    }
}

// Volver a la pantalla del listado
if (isset($_REQUEST['volverListado']) || isset($_REQUEST['cancelar'])) {
    header("Location: Ejercicio1_listado.php");
}

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

    <h2>Editar Empleado:</h2>

    <!-- Mostrar la información del empleado a modificar -->
    <div>
        <h3>Empleado que está siendo modificado:</h3>
        <p><strong>Nombre:</strong> <?php echo isset($nombre) ? $nombre : 'No definido'; ?></p>
        <p><strong>Sueldo:</strong> <?php echo isset($sueldo) ? $sueldo : 'No definido'; ?> €</p>
    </div>

    <h3>Modificar Datos:</h3>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>" required><br><br>

        <label for="sueldo">Sueldo:</label><br>
        <input type="number" name="sueldo" value="<?php echo isset($sueldo) ? $sueldo : ''; ?>" required><br><br>

        <input type="submit" name="guardar" value="Guardar Cambios">
    </form>

    <br><br>
    
    <form method="POST" action="">
        <input type="submit" name="cancelar" value="Cancelar">
    </form>

    <form method="POST" action="">
        <input type="submit" name="volver" value="Volver al inicio">
    </form>

    <form method="POST" action="">
        <input type="submit" name="volverListado" value="Volver a la página del Listado">
    </form>
</body>

</html>
 