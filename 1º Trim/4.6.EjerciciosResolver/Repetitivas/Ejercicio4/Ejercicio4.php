<?php 
// Verifica si el formulario ha sido enviado
if (isset($_POST['bloque']) && isset($_POST['piso'])) {

    // Obtener los valores del formulario
    $bloqueLlamado = $_POST['bloque'];
    $pisoLlamado = $_POST['piso'];

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
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
        <table>
            <tr>
                <th>Bloque <?= $bloque ?></th>
                <th>Piso</th>
                <th>Llamar</th>
            </tr>
            <?php
            for ($piso = 1; $piso <= 7; $piso++) {
            ?>
                <tr>
                    <td><?= $bloque ?></td>
                    <td><?= $piso ?></td>
                    <td><a href='Ejercicio4.php?bloque=<?=$bloque?>&piso=<?=$piso?>'>Llamar</a></td>
                    <?php 
                    if(isset($bloqueLlamado) && isset($pisoLlamado) && $bloqueLlamado==$bloque && $pisoLlamado==$piso) {
                        ?>
                        <td>Usted ha llamado al piso <?=$piso?> del bloque <?=$bloque?></td>
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