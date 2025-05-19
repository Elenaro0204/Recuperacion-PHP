<?php
// Incluyo la clase Empleado
include_once 'Empleado.php';

// Inicio la sesion
if (session_status() == PHP_SESSION_NONE) session_start();

// Compruebo que he recibido los parametros
if (isset($_REQUEST['add']) && isset($_REQUEST['nombre']) && isset($_REQUEST['sueldo'])) {
    $nombre = $_REQUEST['nombre'];
    $sueldo = $_REQUEST['sueldo'];

    // Creo el nuevo empleado
    $nuevoEmpleado = new Empleado($nombre, $sueldo);

    // Verifico si ya existe el array de empleados en la sesión
    if (!isset($_SESSION['empleados'])) {
        $_SESSION['empleados'] = [];
    }

    // Serializo el empleado para añadirlo al array de sesion
    $nuevoEmpleadoSerializado = base64_encode(serialize($nuevoEmpleado));

    // Añado el nuevo empleado al array de session Empleados
    $_SESSION['empleados'][] = $nuevoEmpleadoSerializado;
}

// // Listar empleados
// if (isset($_POST['listar'])) {
//     echo "<h2>Listado de Empleados</h2>";

//     // Compruebo que la sesion Empleados no esta vacia
//     if (!empty($_SESSION['empleados'])) {
//         echo "<table border='1' cellpadding='8' cellspacing='0'>";
//         echo "<tr><th>Nombre</th><th>Sueldo</th><th>Impuestos</th></tr>";

//         foreach ($_SESSION['empleados'] as $empleadoSerializado) {
//             $empleado = unserialize(base64_decode($empleadoSerializado));
//             $nombre = $empleado->getNombre();
//             $sueldo = $empleado->getSueldo();
//             $pagaImpuestos = $empleado->imprimirMensajeImpuestos();

//             // Añado la informacion a la tabla
//             echo "<tr>";
//             echo "<td>$nombre</td>";
//             echo "<td>$sueldo €</td>";

//             if ($sueldo > 3000) {
//                 echo '<td style="color: red;">' . $pagaImpuestos . '</td>';
//             } else {
//                 echo '<td style="color: green;">' . $pagaImpuestos . '</td>';
//             }
//             echo "</tr>";
//         }

//         echo "</table>";
//     } else {
//         echo "<p style='color: red;'>No hay empleados registrados.</p>";
//     }
// }

// Listar empleados
if (isset($_REQUEST['listar'])) {
    header("Location: Ejercicio1_listado.php");
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

    <h2>Nuevo Empleado:</h2>

    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="sueldo">Sueldo:</label>
        <input type="text" id="sueldo" name="sueldo" required><br><br>

        <input type="submit" name="add" value="Añadir Empleado">
    </form>

    <form method="POST" action="">
        <input type="submit" name="listar" value="Listar Empleados">
    </form>

</body>

</html>