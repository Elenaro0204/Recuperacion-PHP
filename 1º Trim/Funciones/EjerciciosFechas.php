<?php
// FUNCIONES
// Ejercicio 3
function diaSemana($fecha)
{
    $dias = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];
    $timestamp = strtotime($fecha);
    return $dias[date('w', $timestamp)];
}

// Ejercicio 4
function formatoLargoFecha($fecha)
{
    $meses = [
        1 => 'enero',
        2 => 'febrero',
        3 => 'marzo',
        4 => 'abril',
        5 => 'mayo',
        6 => 'junio',
        7 => 'julio',
        8 => 'agosto',
        9 => 'septiembre',
        10 => 'octubre',
        11 => 'noviembre',
        12 => 'diciembre'
    ];
    $timestamp = strtotime($fecha);
    $dia = date('j', $timestamp);
    $mes = $meses[(int)date('n', $timestamp)];
    $anio = date('Y', $timestamp);
    return "$dia de $mes de $anio";
}

// Ejercicio 5
function proximoDia($diaUsuario)
{
    $diaUsuario = strtolower($diaUsuario);

    // Verificar si el día es válido
    $diasEnIngles = [
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday'
    ];

    if (!in_array($diaUsuario, $diasEnIngles)) {
        return "Día no válido";
    }

    $proximo = strtotime("next $diaUsuario"); // Calculamos la próxima fecha
    return date("d-m-Y", $proximo); // Devolvemos la fecha en el formato deseado
}

// Ejercicio 6
function calcularFuturo($anios, $meses, $dias)
{
    $fecha = date("d-m-Y", strtotime("+$anios year +$meses month +$dias day"));
    return [
        'fecha' => $fecha,
        'dia' => diaSemana($fecha)
    ];
}

// Ejercicio 7
function edadEnFuturaFecha($nacimiento, $futura)
{
    $nac = strtotime($nacimiento);
    $fut = strtotime($futura);
    if ($fut > $nac) {
        return floor(($fut - $nac) / (60 * 60 * 24 * 365.25));
    } else {
        return null;
    }
}

// Ejercicio 8
function compararEdades($nombre1, $nac1, $nombre2, $nac2)
{
    $edad1 = floor((time() - strtotime($nac1)) / (60 * 60 * 24 * 365.25));
    $edad2 = floor((time() - strtotime($nac2)) / (60 * 60 * 24 * 365.25));
    if ($edad1 > $edad2) {
        $mayor = $nombre1;
    } elseif ($edad2 > $edad1) {
        $mayor = $nombre2;
    } else {
        $mayor = 'Iguales';
    }
    return [
        'edad1' => $edad1,
        'edad2' => $edad2,
        'mayor' => $mayor
    ];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Fechas con Funciones</title>
    <style>
        body {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        section {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 400px;
            max-width: 100%;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 10px;
        }

        form {
            margin-bottom: 15px;
        }

        input[type="date"],
        input[type="number"],
        input[type="text"],
        select {
            padding: 8px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 95%;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 8px 12px;
            font-size: 1em;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .resultado {
            margin-top: 15px;
            font-size: 1.2em;
            color: #333;
        }

        p {
            font-size: 1em;
            color: #555;
        }
    </style>
</head>

<body>
    <!-- Ejercicio 3 -->
    <section>
        <h2>Ejercicio 3:</h2>
        <p>Pedir una fecha en un formulario con un input de fecha y mostrar a que día de la semana
            corresponde (en español).</p>
        <form method="post">
            <input type="date" name="fecha3">
            <input type="submit" name="submit3" value="Mostrar día">
        </form>
        <?php
        if (isset($_POST['submit3'])) {
            echo "<p class='resultado'>Día de la semana: " . diaSemana($_POST['fecha3']) . "</p>";
        }
        ?>
    </section>

    <!-- Ejercicio 4 -->
    <section>
        <h2>Ejercicio 4:</h2>
        <p>Pedir una fecha en un formulario con un input de fecha y mostrarla en el formato “12 de Enero
            de 2018” (en español).</p>
        <form method="post">
            <input type="date" name="fecha4">
            <input type="submit" name="submit4" value="Mostrar formato largo">
        </form>
        <?php
        if (isset($_POST['submit4'])) {
            echo "<p class='resultado'>Fecha: " . formatoLargoFecha($_POST['fecha4']) . "</p>";
        }
        ?>
    </section>

    <!-- Ejercicio 5 -->
    <section>
        <h2>Ejercicio 5:</h2>
        <p>Pedir un día de la semana en un formulario, seleccionándolo desde una lista desplegable.
            Mostrar la fecha correspondiente al próximo día de la semana elegido por el usuario. </p>
        <form method="post">
            <select name="dia5">
                <option value="monday">Lunes</option>
                <option value="tuesday">Martes</option>
                <option value="wednesday">Miércoles</option>
                <option value="thursday">Jueves</option>
                <option value="friday">Viernes</option>
                <option value="saturday">Sábado</option>
                <option value="sunday">Domingo</option>
            </select>
            <input type="submit" name="submit5" value="Buscar fecha">
        </form>
        <?php
        if (isset($_POST['submit5'])) {
            echo "<p class='resultado'>El próximo día de la semana que cae en " . $_POST['dia5'] . " es: " . proximoDia($_POST['dia5']) . "</p>";
        }
        ?>
    </section>

    <!-- Ejercicio 6 -->
    <section>
        <h2>Ejercicio 6:</h2>
        <p>Mostrar el día de la semana que correspondería, una vez transcurridos un número de años,
            meses, y días elegidos por el usuario, a partir de la fecha actual. </p>
        <form method="post">
            Años: <input type="number" name="anios6" value="0">
            Meses: <input type="number" name="meses6" value="0">
            Días: <input type="number" name="dias6" value="0">
            <input type="submit" name="submit6" value="Calcular">
        </form>
        <?php
        if (isset($_POST['submit6'])) {
            $res = calcularFuturo($_POST['anios6'], $_POST['meses6'], $_POST['dias6']);
            echo "<p class='resultado'>Fecha futura: {$res['fecha']}<br>Día de la semana: {$res['dia']}</p>";
        }
        ?>
    </section>

    <!-- Ejercicio 7 -->
    <section>
        <h2>Ejercicio 7:</h2>
        <p>Pedir al usuario su fecha de nacimiento y una fecha futura, y mostrar la edad que tendrá en esa
            fecha (un año tiene 60*60*24*365.25 segundos)</p>
        <form method="post">
            Fecha de nacimiento: <input type="date" name="nac7"><br>
            Fecha futura: <input type="date" name="fut7">
            <input type="submit" name="submit7" value="Calcular edad">
        </form>
        <?php
        if (isset($_POST['submit7'])) {
            $edad = edadEnFuturaFecha($_POST['nac7'], $_POST['fut7']);
            echo empty($edad) ? "<p class='resultado'>Tendrás $edad años.</p>" : "<p class='resultado'>La fecha futura debe ser posterior al nacimiento.</p>";
        }
        ?>
    </section>

    <!-- Ejercicio 8 -->
    <section>
        <h2>Ejercicio 8:</h2>
        <p>Pedir la fecha de nacimiento y el nombre de dos personas y mostrar la edad de cada una, así
            como el nombre de la persona mayor</p>
        <form method="post">
            Nombre 1: <input type="text" name="nombre1"><br>
            Nacimiento 1: <input type="date" name="nac1"><br>
            Nombre 2: <input type="text" name="nombre2"><br>
            Nacimiento 2: <input type="date" name="nac2"><br>
            <input type="submit" name="submit8" value="Comparar">
        </form>
        <?php
        if (isset($_POST['submit8'])) {
            $res = compararEdades($_POST['nombre1'], $_POST['nac1'], $_POST['nombre2'], $_POST['nac2']);
            echo "<p class='resultado'>{$_POST['nombre1']} tiene {$res['edad1']} años</p><br>";
            echo "<p class='resultado'>{$_POST['nombre2']} tiene {$res['edad2']} años</p><br>";
            echo "<p class='resultado'>El mayor es: {$res['mayor']}</p>";
        }
        ?>
    </section>
</body>

</html>