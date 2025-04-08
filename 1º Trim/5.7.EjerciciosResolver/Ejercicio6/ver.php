<?php
// Si vienen datos anteriores, se recuperan
if (isset($_REQUEST['aspirantes_serializados'])) {
    $aspirantes = unserialize($_REQUEST['aspirantes_serializados']);
} else {
    $aspirantes = [];
}

$dni = $_REQUEST['dni'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Aspirante</title>
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
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
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

        button, input[type="submit"] {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1em;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        button:hover, input[type="submit"]:hover {
            background-color: #45a049;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Datos del Aspirante: <?= htmlspecialchars($dni) ?></h1>

        <?php
        if (empty($aspirantes)) {
            echo "<p>No hay aspirantes registrados todavía.</p>";
        } else {
        ?>
            <table>
                <?php
                foreach ($aspirantes[$dni] as $titulo => $valores) {
                ?>
                    <tr>
                        <th><?= htmlspecialchars($titulo) ?>:</th>
                        <td><?= htmlspecialchars($valores) ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <?php
        }
        ?>

        <form method="post" action="listado.php">
            <input type="hidden" name="aspirantes_serializados" value="<?= htmlspecialchars(serialize($aspirantes)); ?>">
            <input type="submit" value="Volver al listado">
        </form>
    </div>
</body>

</html>
