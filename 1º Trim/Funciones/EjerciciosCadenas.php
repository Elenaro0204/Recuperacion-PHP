<?php
//   FUNCIONES

// Ejercicio 1
function imprimirCaracteres($cadena)
{
    for ($i = 0; $i < strlen($cadena); $i++) {
        echo $cadena[$i] . "<br>";
    }
}

// Ejercicio 2
function cambiarVocales($frase, $vocalNueva)
{
    $vocales = ['a', 'e', 'i', 'o', 'u'];
    $fraseModificada = str_replace($vocales, $vocalNueva, $frase);
    return $fraseModificada;
}

// Ejercicio 3
function contarPalabras($frase)
{
    $palabras = preg_split('/\s+/', trim($frase));
    return count($palabras);
}

// Ejercicio 4
function verificaInicioFinal($cadena)
{
    $palabras = preg_split('/\s+/', trim($cadena));
    $primeraPalabra = strtolower($palabras[0]);
    $ultimaPalabra = strtolower(end($palabras));

    if ($primeraPalabra === $ultimaPalabra) {
        return true;
    } else {
        return false;
    }
}

// Ejercicio 5
function intercambiarHastaOriginal($cadena)
{
    $original = $cadena;
    $rotada = $cadena;
    $contador = 0;

    echo $rotada . "<br>"; // Mostrar original

    do {
        $rotada = substr($rotada, 1) . $rotada[0];
        echo $rotada . "<br>";
        $contador++;
    } while ($rotada !== $original && $contador < strlen($cadena));

    echo $original . " (stop)";
}

// Ejercicio 6
function contarPalabrasPorFrase($parrafo)
{
    $frases = explode('.', $parrafo);
    $resultado = [];

    foreach ($frases as $frase) {
        $palabras = preg_split('/\s+/', trim($frase));
        $resultado[] = count($palabras);
    }

    return $resultado;
}

// Ejercicio 7
function buscarPalabra($frase, $palabraBuscada)
{
    $palabras = preg_split('/\s+/', trim($frase));

    foreach ($palabras as $palabra) {
        if (strtolower($palabra) === strtolower($palabraBuscada)) {
            return true;
        }
    }

    return false;
}

// Ejercicio 8
function obtenerNumerosAscii($cadena)
{
    $numerosAscii = [];

    for ($i = 0; $i < strlen($cadena); $i++) {
        $numerosAscii[] = ord($cadena[$i]);
    }

    return $numerosAscii;
}

function reconstruirDesdeAscii($numerosAscii)
{
    $cadena = '';

    foreach ($numerosAscii as $ascii) {
        $cadena .= chr($ascii);
    }

    return $cadena;
}

// Ejercicio 9
function invertirCadena($cadena)
{
    return strrev($cadena);
}

// Ejercico 10
function formatearNombre($nombreCompleto)
{
    $nombreFormateado = ucwords(strtolower($nombreCompleto));
    $iniciales = '';

    foreach (explode(' ', $nombreFormateado) as $palabra) {
        $iniciales .= strtoupper($palabra[0]);
    }

    return [
        'nombreFormateado' => $nombreFormateado,
        'iniciales' => $iniciales
    ];
}

// Ejercico 11

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Cadenas con Funciones</title>
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
    <!-- Ejercicio 1 -->
    <section>
        <h2>Ejercicio 1</h2>
        <p>Imprimir carácter por carácter un string dado, cada uno en una línea distinta</p>
        <form method="post">
            <input type="text" name="cadena1" placeholder="Introduce una cadena">
            <input type="submit" name="submit1" value="Mostrar caracteres">
        </form>
        <?php
        if (isset($_POST['submit1'])) {
            echo "<p class='resultado'>";
            imprimirCaracteres($_POST['cadena1']);
            echo "</p>";
        }
        ?>
    </section>

    <!-- Ejercicio 2 -->
    <section>
        <h2>Ejercicio 2</h2>
        <p>Cambiar todas las vocales de la frase por otra vocal introducida por el usuario</p>
        <p><b>Frase sin modificar:</b> Tengo una hormiguita en la patita, que me esta haciendo cosquillitas y no me puedo aguantar.</p>
        <form method="post">
            <label for="vocal">Introduce una vocal:</label>
            <input type="text" name="vocal" id="vocal" maxlength="1" pattern="[aeiouAEIOU]" required>
            <input type="hidden" name="frase2" id="frase2" value="Tengo una hormiguita en la patita, que me esta haciendo cosquillitas y no me puedo aguantar." required>
            <input type="submit" name="submit2" value="Cambiar vocales">
        </form>
        <?php
        if (isset($_POST['submit2'])) {
            $frase = $_POST['frase2'];
            $vocalNueva = strtolower($_POST['vocal']);
            echo "<p class='resultado'><b>Frase Modificada:</b> " . cambiarVocales($frase, $vocalNueva) . "</p>";
        }
        ?>
    </section>

    <!-- Ejercicio 3 -->
    <section>
        <h2>Ejercicio 3</h2>
        <p>Contar cuántas palabras tiene una frase introducida por el usuario (puede tener espacios de más).</p>
        <form method="post">
            <label for="frase3">Introduce una frase:</label>
            <input type="text" name="frase3" id="frase3" required>
            <input type="submit" name="submit3" value="Contar palabras">
        </form>
        <?php
        if (isset($_POST['submit3'])) {
            $total = contarPalabras($_POST['frase3']);
            echo "<p class='resultado'>La frase tiene $total palabra(s).</p>";
        }
        ?>
    </section>

    <!-- Ejercicio 4 -->
    <section>
        <h2>Ejercicio 4</h2>
        <p>Verificar si una cadena empieza y termina con la misma palabra.</p>
        <form method="post">
            <input type="text" name="cadena4" required>
            <input type="submit" name="submit4" value="Verificar">
        </form>
        <?php
        if (isset($_POST['submit4'])) {
            $resultado = verificaInicioFinal($_POST['cadena4']) ? "Sí" : "No";
            echo "<p class='resultado'>¿Empieza y termina con la misma palabra? $resultado</p>";
        }
        ?>
    </section>

    <!-- Ejercicio 5 -->
    <section>
        <h2>Ejercicio 5</h2>
        <p>Intercambiar letras del string hasta volver a su forma original.</p>
        <form method="post">
            <input type="text" name="cadena5" required>
            <input type="submit" name="submit5" value="Mostrar rotaciones">
        </form>
        <?php
        if (isset($_POST['submit5'])) {
            echo "<p class='resultado'>";
            intercambiarHastaOriginal($_POST['cadena5']);
            echo "</p>";
        }
        ?>
    </section>

    <!-- Ejercicio 6 -->
    <section>
        <h2>Ejercicio 6</h2>
        <p>Contar cuántas palabras tiene cada frase (separadas por un punto).</p>
        <form method="post">
            <input type="text" name="parrafo6" placeholder="Introduce dos frases separadas por punto" required>
            <input type="submit" name="submit6" value="Contar palabras">
        </form>
        <?php
        if (isset($_POST['submit6'])) {
            $resultados = contarPalabrasPorFrase($_POST['parrafo6']);
            foreach ($resultados as $i => $cantidad) {
                echo "<p class='resultado'>Frase " . ($i + 1) . ": $cantidad palabra(s).</p>";
            }
        }
        ?>
    </section>

    <!-- Ejercicio 7 -->
    <section>
        <h2>Ejercicio 7</h2>
        <p>Verificar si una palabra se encuentra en una frase.</p>
        <form method="post">
            <input type="text" name="frase7" placeholder="Frase" required>
            <input type="text" name="buscar7" placeholder="Palabra a buscar" required>
            <input type="submit" name="submit7" value="Buscar">
        </form>
        <?php
        if (isset($_POST['submit7'])) {
            $encontrada = buscarPalabra($_POST['frase7'], $_POST['buscar7']) ? "Sí" : "No";
            echo "<p class='resultado'>¿Está la palabra '" .  $_POST['buscar7'] . "' en la frase? $encontrada</p>";
        }
        ?>
    </section>

    <!-- Ejercicio 8 -->
    <section>
        <h2>Ejercicio 8</h2>
        <p>Convertir frase a ASCII y luego reconstruirla.</p>
        <form method="post">
            <input type="text" name="cadena8" required>
            <input type="submit" name="submit8" value="Codificar y Decodificar">
        </form>
        <?php
        if (isset($_POST['submit8'])) {
            $ascii = obtenerNumerosAscii($_POST['cadena8']);
            echo "<p class='resultado'><b>Códigos ASCII:</b> " . implode('', $ascii) . "</p>";

            echo "<p class='resultado'><b>Frase reconstruida:</b> " . reconstruirDesdeAscii($ascii) . "</p>";
        }
        ?>
    </section>

    <!-- Ejercicio 9 -->
    <section>
        <h2>Ejercicio 9</h2>
        <p>Invertir una cadena introducida por el usuario.</p>
        <form method="post">
            <input type="text" name="cadena9" required>
            <input type="submit" name="submit9" value="Invertir cadena">
        </form>
        <?php
        if (isset($_POST['submit9'])) {
            echo "<p class='resultado'><b>Cadena invertida:</b> " . invertirCadena($_POST['cadena9']) . "</p>";
        }
        ?>
    </section>

    <!-- Ejercicio 10 -->
    <section>
        <h2>Ejercicio 10</h2>
        <p>Mostrar nombre formateado con mayúsculas e iniciales.</p>
        <form method="post">
            <input type="text" name="nombre10" placeholder="Nombre y apellidos" required>
            <input type="submit" name="submit10" value="Formatear">
        </form>
        <?php
        if (isset($_POST['submit10'])) {
            $resultado = formatearNombre($_POST['nombre10']);
            echo "<p class='resultado'>Nombre formateado: " . $resultado['nombreFormateado'] . "</p>";
            echo "<p class='resultado'>Iniciales: " . $resultado['iniciales'] . "</p>";
        }
        ?>
    </section>

    <!-- Ejercicoi 11 -->
    <section>
        <h2>Ejercicio 11</h2>
        <p>Escribir una clase que lea n caracteres que forman un número romano y que imprima:</p>
        <ol>
            <li>
                <p>Si la entrada fue correcta, un string que represente el equivalente decimal</p>
            </li>
            <li>
                <p>Si la entrada fue errónea, un mensaje de error.</p>
            </li>
        </ol>
        <p>Nota: La entrada será correcta si contiene solo los caracteres M:1000, D:500, C:100, L:50, X:10,
            I:1. No se tendrá en cuenta el orden solo se sumará el valor de cada letra.</p>
        <form method="post">
            <input type="text" name="romano11" placeholder="Número Romano" required>
            <input type="submit" name="submit11" value="Convertir">
        </form>
        <?php
        require_once 'NumeroRomano.php';
        
        if (isset($_POST['submit11'])) {
            $numeroRomano = new NumeroRomano($_POST['romano11']);
            echo "<p class='resultado'>" . $numeroRomano->convertirADecimal() . "</p>";
        }
        ?>
    </section>
</body>

</html>