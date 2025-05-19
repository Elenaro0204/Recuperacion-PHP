<?php
// Incluyo la clase Empleado
include_once 'Empleado.php';

// Defino la constante del fichero
define("FICHERO", "empleados.txt");

// Inicio la sesion
if (session_status() == PHP_SESSION_NONE) session_start();

// Eliminar todos los empleados de la sesion
if (isset($_REQUEST['borrar'])) {
    unset($_SESSION['empleados']);
    echo "<p style='color: red;'>Todos los empleados han sido eliminados.</p>";
}

// Volver a la pantalla de inicio
if (isset($_REQUEST['volver'])) {
    header("Location: Ejercicio1.php");
}

// Eliminar un solo empleado
if (isset($_REQUEST['eliminar']) && isset($_REQUEST['indiceEliminar'])) {
    $indice = $_REQUEST['indiceEliminar'];
    if (isset($_SESSION['empleados'][$indice])) {
        unset($_SESSION['empleados'][$indice]);
        $_SESSION['empleados'] = array_values($_SESSION['empleados']); // reindexar
        echo "<p style='color: blue;'>Empleado eliminado correctamente.</p>";
    }
}

// Modificar empleados
if (isset($_REQUEST['modificar']) && isset($_REQUEST['indiceModificar'])) {
    $_SESSION['indiceModificar'] = $_REQUEST['indiceModificar'];
    header("Location: Ejercicio1_modificar.php");
}

// Volcar y recuperar del fichero
if (isset($_REQUEST['fichero']) || isset($_REQUEST['recuperar'])) {
    header("Location: Ejercicio1_fichero.php");
}

// Subir sueldo de un empleado
if (isset($_POST['subirSueldo']) && isset($_POST['indiceSubirSueldo'])) {
    $indice = $_POST['indiceSubirSueldo'];

    if (isset($_SESSION['empleados'][$indice])) {
        $empleado = unserialize(base64_decode($_SESSION['empleados'][$indice]));
        // var_dump($empleado); // Comprueba si es objeto válido

        $nuevoSueldo = Empleado::subirSueldo($empleado->getSueldo());
        $empleado->setSueldo($nuevoSueldo);

        $_SESSION['empleados'][$indice] = base64_encode(serialize($empleado));

        echo "<p style='color: green;'>Sueldo de {$empleado->getNombre()} actualizado a {$nuevoSueldo} €.</p>";
    } else {
        echo "Empleado no encontrado en sesión.";
    }
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

    <h2>Listado de Empleados:</h2>

    <?php
    // Compruebo que la sesion Empleados no esta vacia
    if (!empty($_SESSION['empleados'])) {
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><th>Nombre</th><th>Sueldo</th><th>Impuestos</th><th>Acciones</th></tr>";

        foreach ($_SESSION['empleados'] as $i => $empleadoSerializado) {
            $empleado = unserialize(base64_decode($empleadoSerializado));
            $nombre = $empleado->getNombre();
            $sueldo = $empleado->getSueldo();
            $pagaImpuestos = $empleado->imprimirMensajeImpuestos();

            // Añado la informacion a la tabla
            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>$sueldo €</td>";

            if ($sueldo > 3000) {
                echo '<td style="color: red;">' . $pagaImpuestos . '</td>';
            } else {
                echo '<td style="color: green;">' . $pagaImpuestos . '</td>';
            }

    ?>
            <td>
                <form method='POST' action=''>
                    <input type='hidden' name='indiceEliminar' value='<?php echo $i; ?>'>
                    <input type='submit' name='eliminar' value='Eliminar'>
                </form>
                <br>
                <form method='POST' action=''>
                    <input type='hidden' name='indiceModificar' value='<?php echo $i; ?>'>
                    <input type='submit' name='modificar' value='Modificar'>
                </form>
                <form method='POST' action=''>
                    <input type='hidden' name='indiceSubirSueldo' value='<?php echo $i; ?>'>
                    <input type='submit' name='subirSueldo' value='Subir sueldo (+100€)'>
                </form>
            </td>
    <?php

            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<h3 style='color: red;'>No hay empleados registrados.</h3>";
    }
    ?>

    <form method="POST" action="">
        <input type="submit" name="borrar" value="Borrar Todos los Empleados">
    </form>

    <form method="POST" action="">
        <input type="submit" name="fichero" value="Volcar en el Fichero">
    </form>

    <form method="POST" action="">
        <input type="submit" name="recuperar" value="Recuperar del Fichero">
    </form>

    <form method="POST" action="">
        <input type="submit" name="volver" value="Volver al inicio">
    </form>
</body>

</html>