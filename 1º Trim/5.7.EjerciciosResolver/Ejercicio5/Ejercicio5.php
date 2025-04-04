<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 Arrays</title>
</head>

<body>
    <h1>Ejercicio 5</h1>
    <p>Realizar una aplicación web que permita introducir los datos de unos aspirantes a un trabajo. Para
        ello en la página principal se deberá mostrar un formulario para introducir los siguientes datos:
        Nombre, edad, años de experiencia y correo. Tendremos un botón para aceptar los datos introducidos
        del aspirante y otro para finalizar la lista de aspirantes. La aplicación deberá ir almacenando los datos
        de los aspirantes en un array asociativo, cuyo índice principal sea el nombre. Cuando se pulse el botón
        Finalizar, se enviarán los datos a otra página para mostrar el listado de los aspirantes, y como se
        buscan un perfil joven, los mayores de 30 saldrán con el texto de color rojo.
        Si se carga la segunda página sin enviar el listado desde la primera, se mostrará un mensaje indicando
        que primero se deben introducir los aspirantes y un enlace a la primera página.</p>

    <div style="width: 500px; margin:auto; ">
        <h1>Inscríbete a este puesto de trabajo</h1>

        <?php
        // Si vienen datos anteriores, los recuperamos
        $aspirantes = [];

        if (isset($_POST['aspirantes_serializados'])) {
            $aspirantes = unserialize($_POST['aspirantes_serializados']);
        }

        // Si se ha enviado un nuevo aspirante, lo añadimos al array
        if (isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['experiencia']) && isset($_POST['correo'])) {
            $nombre = $_POST['nombre'];
            $aspirantes[$nombre] = [
                'edad' => $_POST['edad'],
                'experiencia' => $_POST['experiencia'],
                'correo' => $_POST['correo']
            ];
        }
        ?>

        <!-- Formulario para añadir un nuevo aspirante -->
        <form method="post" action="Ejercicio5.php">
            <fieldset>
                <legend>Añadir aspirante</legend>

                <label>Nombre:</label><br>
                <input type="text" name="nombre" required>
                <br><br>

                <label>Edad:</label><br>
                <input type="number" name="edad" min="18" required>
                <br><br>

                <label>Experiencia:</label><br>
                <input type="number" name="experiencia" min="0" required>
                <br><br>

                <label>Correo:</label><br>
                <input type="email" name="correo" required>
                <br><br>

                <!-- Pasamos el array actual en un campo oculto -->
                <input type="hidden" name="aspirantes_serializados" value="<?php echo htmlspecialchars(serialize($aspirantes)); ?>">
                <input type="submit" value="Aceptar">
            </fieldset>
        </form>
        <br>
        <!-- Formulario para ver el listado -->
        <form method="post" action="Ejercicio5_listado.php">
            <input type="hidden" name="aspirantes_serializados" value="<?php echo htmlspecialchars(serialize($aspirantes)); ?>">
            <input type="submit" value="Ver listado de aspirantes">
        </form>

    </div>

</body>

</html>