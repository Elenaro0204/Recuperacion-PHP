<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Verifica si el formulario ha sido enviado
    if (isset($_POST['bloque']) && isset($_POST['piso'])) {

        // Obtener los valores del formulario
        $bloqueLlamado = $_POST['bloque'];
        $pisoLlamado = $_POST['piso'];
    }
    ?>
    <h1>Usted ha llamado al piso <?= $pisoLlamado ?> del bloque <?= $bloqueLlamado ?></h1>
</body>

</html>