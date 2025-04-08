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
    <title>Currículum Aspirante</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
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

        fieldset {
            background-color: #fafafa;
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

        .link-container {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Bienvenid@ a curriculumns.net</h1>
        <form action="datos.php" method="post">
            <fieldset>
                <legend>Añadir Curriculum</legend>
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" required><br>
                <!-- Pasamos el array actual en un campo oculto -->
                <input type="hidden" name="aspirantes_serializados" value="<?php echo htmlspecialchars(serialize($aspirantes)); ?>">
                <button type="submit">Añadir</button>
            </fieldset>
        </form>

        <div class="link-container">
            <form method="post" action="listado.php">
                <input type="hidden" name="aspirantes_serializados" value="<?php echo htmlspecialchars(serialize($aspirantes)); ?>">
                <button class="back-button" type="submit">Ver listado de aspirantes</button>
            </form>
        </div>
    </div>
</body>

</html>
