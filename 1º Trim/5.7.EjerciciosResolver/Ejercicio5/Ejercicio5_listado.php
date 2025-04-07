<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Aspirantes</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .mayor30 {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1 style="text-align:center;">Listado de Aspirantes</h1>

    <?php
    if (isset($_POST['aspirantes_serializados'])) {
        $aspirantes = unserialize($_POST['aspirantes_serializados']);

        if (!empty($aspirantes)) {
            echo "<table>";
            echo "<tr><th>Nombre</th><th>Edad</th><th>Experiencia</th><th>Correo</th></tr>";

            foreach ($aspirantes as $nombre => $datos) {
                $clase = ($datos['edad'] >= 30) ? 'mayor30' : '';
                echo "<tr>";
                echo "<td class='$clase'>$nombre</td>";
                echo "<td>{$datos['edad']}</td>";
                echo "<td>{$datos['experiencia']}</td>";
                echo "<td>{$datos['correo']}</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p style='text-align:center;'>No hay aspirantes registrados.</p>";
        }
    ?>
        <form action="Ejercicio5.php" method="post" style="text-align:center;">
            <input type="hidden" name="aspirantes_serializados" value="<?php echo htmlspecialchars(serialize($aspirantes)); ?>">
            <input type="submit" value="Volver a la página principal">
        </form>
    <?php
    } else {
    ?>
        <p style='text-align:center;'>Primero debes introducir los aspirantes.</p>
        <p style="text-align:center;"><a href="Ejercicio5.php">Ir al formulario</a></p>
    <?php
    }
    ?>
</body>

</html>