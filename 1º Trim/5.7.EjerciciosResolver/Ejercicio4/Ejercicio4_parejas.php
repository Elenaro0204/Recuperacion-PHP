<?php
if (!isset($_REQUEST['personas'])) {
    header('location:Ejercicio4.php');
    exit;
}

$personas = unserialize(base64_decode($_REQUEST['personas']));
$seleccionado = $_REQUEST['seleccionado'] ?? '';
$persona1 = null;
$parejaElegida = null;
$posibles = [];

if ($seleccionado) {
    foreach ($personas as $p) {
        if ($p['nombre'] === $seleccionado) {
            $persona1 = $p;
            break;
        }
    }

    if ($persona1) {
        foreach ($personas as $p) {
            if ($p !== $persona1) {
                if (
                    ($persona1['orientacion'] == 'het' && $p['sexo'] != $persona1['sexo'] && $p['orientacion'] != 'hom') ||
                    ($persona1['orientacion'] == 'hom' && $p['sexo'] == $persona1['sexo'] && $p['orientacion'] != 'het') ||
                    ($persona1['orientacion'] == 'bis' &&
                        !(($p['orientacion'] == 'het' && $p['sexo'] == $persona1['sexo']) ||
                            ($p['orientacion'] == 'hom' && $p['sexo'] != $persona1['sexo'])))
                ) {
                    $posibles[] = $p;
                }
            }
        }

        if (!empty($posibles)) {
            // No es necesario usar el array_rand porque esto solo es para arrays asociativos, se puede hacer con un random basico
            $parejaElegida = $posibles[array_rand($posibles)];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <style>
        .verde {
            background-color: lightgreen;
        }

        .amarillo {
            background-color: yellow;
        }

        .rojo {
            background-color: lightcoral;
        }

        table {
            width: 50%;
            margin: auto;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>

<body style="text-align: center;">
    <h1>Selecciona una persona</h1>
    <form method="post">
        <input type="hidden" name="personas" value="<?= base64_encode(serialize($personas)) ?>">
        <select name="seleccionado" onchange="this.form.submit()">
            <option value="">-- Selecciona --</option>
            <?php foreach ($personas as $p) : ?>
                <option value="<?= $p['nombre'] ?>" <?= ($p['nombre'] === $seleccionado) ? 'selected' : '' ?>>
                    <?= $p['nombre'] ?> (<?= $p['sexo'] ?>, <?= $p['orientacion'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <?php if ($parejaElegida) : ?>
        <h2 class="verde">Pareja seleccionada: <?= $persona1['nombre'] ?> y <?= $parejaElegida['nombre'] ?></h2>
    <?php endif; ?>
    <div style="width: 500px; margin:auto; ">

        <h3>Lista de personas y compatibilidad</h3>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Sexo</th>
                <th>Orientación</th>
                <th>Compatibilidad</th>
            </tr>
            <?php foreach ($personas as $p) :
                $clase = "rojo";
                $compatibilidad = "No compatible";

                if ($p === $persona1 || $p === $parejaElegida) {
                    $clase = "verde";
                    $compatibilidad = "Pareja elegida";
                } elseif (in_array($p, $posibles)) {
                    $clase = "amarillo";
                    $compatibilidad = "Posible candidato";
                }
            ?>
                <tr class="<?= $clase ?>">
                    <td><?= $p['nombre'] ?></td>
                    <td><?= ($p['sexo'] == 'h') ? 'Hombre' : 'Mujer' ?></td>
                    <td><?= ($p['orientacion'] == 'het') ? 'Heterosexual' : ($p['orientacion'] == 'hom' ? 'Homosexual' : 'Bisexual') ?></td>
                    <td><?= $compatibilidad ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br><br>
        <form action="Ejercicio4_tabla.php" method="post">
            <fieldset>
                <legend>Pasar a ver el listado de personas</legend>
                <br>
                <input type="hidden" name="personas" value=<?= base64_encode(serialize($personas)) ?>>
                <input type="submit" value="VER LISTADO">
                <br><br>
            </fieldset>
        </form>
        <br><br>
        <form action="Ejercicio4.php" method="post">
            <fieldset>
                <legend>Pasar a agregar parejas amorosas</legend>
                <br>
                <input type="hidden" name="personas" value=<?= base64_encode(serialize($personas)) ?>>
                <input type="submit" value="VOLVER AL INICIO">
                <br><br>
            </fieldset>
        </form>
    </div>
</body>

</html>