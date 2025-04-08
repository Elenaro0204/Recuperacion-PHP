<?php
// Si vienen datos anteriores, se recuperan
if (isset($_REQUEST['aspirantes_serializados'])) {
    $aspirantes = unserialize($_REQUEST['aspirantes_serializados']);
} else {
    $aspirantes = [];
}

$dni = $_REQUEST['dni'];

// Si se ha enviado un nuevo aspirante, se añade al array
if (isset($_REQUEST['dni']) && isset($_REQUEST['titulo']) && isset($_REQUEST['valor'])) {
    $titulo = $_REQUEST['titulo'];
    $valor = $_REQUEST['valor'];

    // Añadir el dato al array
    $aspirantes[$dni][$titulo] = $valor;

    // Muestro el array aspirantes
    // echo "<pre>";
    // print_r($aspirantes);
    // echo "</pre>";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículum Aspirante</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            width: 80%;
            max-width: 900px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #4CAF50;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        h2 {
            color: #555;
            font-size: 2em;
            margin-bottom: 15px;
        }

        fieldset {
            background-color: #f9f9f9;
            border: 2px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }

        legend {
            font-size: 1.5em;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            text-align: left;
            font-size: 1.1em;
            color: #555;
        }

        input[type="text"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 1.1em;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1.2em;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .curriculum-list {
            margin-top: 30px;
            text-align: left;
        }

        .curriculum-list h3 {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 15px;
        }

        .curriculum-list ul {
            list-style-type: none;
            padding: 0;
        }

        .curriculum-list li {
            font-size: 1.2em;
            margin: 10px 0;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .no-data {
            color: #ff7043;
            font-size: 1.2em;
        }

        .form-container {
            margin-top: 30px;
        }

        .back-button {
            background-color: #e4e4e4;
            color: #333;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1.2em;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #ccc;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Bienvenid@ a curriculumns.net</h1>
        <h2>Currículum de <?= htmlspecialchars($dni) ?></h2>

        <form action="" method="post">
            <fieldset>
                <legend>Datos adicionales del Curriculum</legend>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required><br>

                <label for="valor">Valor:</label>
                <input type="text" id="valor" name="valor" required><br>

                <input type="hidden" name="dni" value="<?= htmlspecialchars($dni) ?>">
                <input type="hidden" name="aspirantes_serializados" value="<?= htmlspecialchars(serialize($aspirantes)) ?>">

                <button type="submit">Añadir</button>
            </fieldset>
        </form>

        <div class="form-container">
            <form method="post" action="index.php">
                <input type="hidden" name="aspirantes_serializados" value="<?= htmlspecialchars(serialize($aspirantes)) ?>">
                <button class="back-button" type="submit">Finalizar Curriculum</button>
            </form>
        </div>

        <div class="curriculum-list">
            <h3>Datos actuales:</h3>
            <?php
            if (isset($aspirantes[$dni]) && !empty($aspirantes[$dni])) {
                foreach ($aspirantes[$dni] as $titulo => $valor) { 
            ?>
                    <ul>
                        <li><strong><?= htmlspecialchars($titulo) ?>:</strong> <?= htmlspecialchars($valor) ?></li>
                    </ul>
            <?php
                }
            } else {
                echo "<p class='no-data'>No hay datos aún para este DNI.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>
