<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas</title>
</head>

<body>
    <div style="width: 500px; margin:auto; ">
        <h1>Lista de personas registradas</h1>

        <?php
        // Recuperar la lista de personas
        if (isset($_POST['personas'])) {
            $personas = unserialize(base64_decode($_POST['personas']));
        } else {
            echo "<p>No hay personas registradas.</p>";
            exit;
        }

        // Eliminar persona si se ha enviado un índice de eliminación
        if (isset($_POST['eliminar'])) {
            $indexEliminar = $_POST['eliminar'];
            if (isset($personas[$indexEliminar])) {
                array_splice($personas, $indexEliminar, 1); // Elimina la persona del array
            }
        }
        ?>

        <table border="1" cellpadding="5">
            <tr>
                <th>Nombre</th>
                <th>Sexo</th>
                <th>Orientación</th>
                <th>Acciones</th>
            </tr>

            <?php foreach ($personas as $index => $persona) : ?>
                <tr>
                    <td><?= htmlspecialchars($persona['nombre']) ?></td>
                    <td><?= $persona['sexo'] == 'h' ? 'Hombre' : 'Mujer' ?></td>
                    <td>
                        <?php
                        if ($persona['orientacion'] == 'het') {
                            echo 'Heterosexual';
                        } elseif ($persona['orientacion'] == 'hom') {
                            echo 'Homosexual';
                        } else {
                            echo 'Bisexual';
                        }
                        ?>
                    </td>
                    <td>
                        <!-- Botón para eliminar persona -->
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="personas" value="<?= base64_encode(serialize($personas)) ?>">
                            <input type="hidden" name="eliminar" value="<?= $index ?>">
                            <input type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <form action="Ejercicio4.php" method="post">
            <fieldset>
                <legend>Pasar a agregar parejas amorosas</legend>
                <br>
                <input type="hidden" name="personas" value="<?= base64_encode(serialize($personas)) ?>">
                <input type="submit" value="VOLVER AL INICIO">
            </fieldset>
        </form>
    </div>

</body>

</html>