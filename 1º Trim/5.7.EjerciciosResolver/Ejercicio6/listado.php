<?php
if (isset($_REQUEST['aspirantes_serializados'])) {
    $aspirantes = unserialize($_REQUEST['aspirantes_serializados']);
} else {
    $aspirantes = [];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Aspirantes</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 900px;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f1f1f1;
            color: #555;
        }

        td {
            background-color: #fafafa;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-container {
            margin-top: 20px;
        }

        .no-aspirantes {
            font-size: 1.2em;
            color: #ff7043;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Listado de todos los aspirantes</h1>

        <table>
            <tr>
                <th>DNI</th>
                <th>Ver detalle</th>
            </tr>
            <?php
            if (empty($aspirantes)) {
                echo "<tr><td colspan='2' class='no-aspirantes'>No hay aspirantes registrados todavía.</td></tr>";
            } else {
                foreach ($aspirantes as $dni => $datos) {
            ?>
                    <tr class="aspirante">
                        <td><?= htmlspecialchars($dni) ?></td>
                        <td>
                            <form action="ver.php" method="get">
                                <input type="hidden" name="dni" value="<?= htmlspecialchars($dni) ?>">
                                <input type="hidden" name="aspirantes_serializados" value="<?= htmlspecialchars(serialize($aspirantes)); ?>">
                                <input type="submit" value="Ver detalle">
                            </form>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>

        <div class="form-container">
            <form method="post" action="index.php">
                <input type="hidden" name="aspirantes_serializados" value="<?= htmlspecialchars(serialize($aspirantes)); ?>">
                <input type="submit" value="Volver al inicio">
            </form>
        </div>
    </div>
</body>

</html>
