<?php
// Verifica si el formulario ha sido enviado
if (isset($_REQUEST['bloque']) && isset($_REQUEST['piso'])) {

    // Obtener los valores del formulario
    $bloqueLlamado = $_REQUEST['bloque'];
    $pisoLlamado = $_REQUEST['piso'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 Repetitivas</title>
</head>

<body>
    <h1>Ejercicio 4</h1>
    <p>Diseñar una página web que muestre una tabla con 3 columnas, la primera corresponde al número de
        bloque, la segunda al piso y en la tercera hay un botón llamar. En total hay 10 bloques y cada bloque
        tiene 7 pisos. Cuando se pulse llamar en un piso de un bloque, mostrará en otra página el mensaje del
        tipo “Usted ha llamado al piso 3 del bloque 6”. Utiliza estructuras repetitivas para generar la tabla</p>


    <?php
    for ($bloque = 1; $bloque <= 10; $bloque++) {
    ?>
        <table border="1">
            <tr>
                <th style="padding: 5px;">Bloque <?= $bloque ?></th>
                <th style="padding: 5px;">Piso</th>
                <th style="padding: 5px;">Llamar</th>
            </tr>
            <?php
            for ($piso = 1; $piso <= 7; $piso++) {
            ?>
                <tr>
                    <td><?= $bloque ?></td>
                    <td><?= $piso ?></td>
                    <td>

                        <!-- FORMA 1 -->
                        <!-- Se muestra el mensaje en esta misma pagina -->
                        <form method="Post" action="Ejercicio4.php">
                            <input type="hidden" name="bloque" value="<?= $bloque ?>">
                            <input type="hidden" name="piso" value="<?= $piso ?>">
                            <input type="submit" value="Llamar">
                        </form>

                        <!-- FORMA 2 -->
                        <!-- Se muestra el mensaje en otra pagina -->
                        <!-- <form method="Post" action="Ejercicio4Llamar.php">
                            <input type="hidden" name="bloque" value="<?= $bloque ?>">
                            <input type="hidden" name="piso" value="<?= $piso ?>">
                            <input type="submit" value="Llamar">
                        </form> -->

                        <!-- FORMA 3 -->
                        <!-- Se muestra el mensaje en otra pagina -->
                        <!-- <a href='Ejercicio4Llamar.php?bloque=<?= $bloque ?>&piso=<?= $piso ?>'>Llamar</a> -->

                        <!-- FORMA 4 -->
                        <!-- Se muestra el mensaje en esta misma pagina -->
                        <!-- <a href='Ejercicio4.php?bloque=<?= $bloque ?>&piso=<?= $piso ?>'>Llamar</a> -->
                    </td>
                    <?php
                    if (isset($bloqueLlamado) && isset($pisoLlamado) && $bloqueLlamado == $bloque && $pisoLlamado == $piso) {
                    ?>
                        <td>Usted ha llamado al piso <?= $pisoLlamado ?> del bloque <?= $bloqueLlamado ?></td>
                    <?php
                    }
                    ?>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
    <?php
    }
    ?>

</body>

</html>