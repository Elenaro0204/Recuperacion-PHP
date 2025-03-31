<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Clase</title>
</head>

<body>
    <?php
    // Ejercicio 1
    $persona1 = [
        ["nombre" => "Rosa", "estatura" => 168, "sexo" => "F"],
        ["nombre" => "Ignacio", "estatura" => 175, "sexo" => "M"],
        ["nombre" => "Daniel", "estatura" => 172, "sexo" => "M"],
        ["nombre" => "Rubén", "estatura" => 182, "sexo" => "M"]
    ];

    echo "<h1>DATOS SOBRE EL PERSONAL</h1>";

    // Con foreach
    echo "<h2>Con foreach</h2>";
    foreach ($persona1 as $clave => $valor) {
        echo "Linea $clave -> ";
        foreach ($valor as $clave2 => $valor2) {
            echo ucfirst($clave2) . ": $valor2 <br>";
        }
        echo "<hr>";
    }
    // Con for
    echo "<h2>Con for</h2>";
    for ($i = 0; $i < count($persona1); $i++) {
        echo "Linea $i -> ";
        foreach ($persona1[$i] as $clave2 => $valor2) {
            echo ucfirst($clave2) . ": $valor2 <br>";
        }
        echo "<hr>";
    }

    // Insertados en una tabla con foreach
    echo "<h2>Con foreach en una tabla</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Estatura</th><th>Sexo</th></tr>";
    foreach ($persona1 as $clave => $valor) {
        echo "<tr>";
        foreach ($valor as $clave2 => $valor2) {
            echo "<td>$valor2</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Ejercicio 2
    $persona2 = [
        "49522793K" => ["nombre" => "Rosa", "estatura" => 168, "sexo" => "F"],
        "55511235B" => ["nombre" => "Ignacio", "estatura" => 175, "sexo" => "M"],
        "54122336A" => ["nombre" => "Daniel", "estatura" => 172, "sexo" => "M"],
        "99987415E" => ["nombre" => "Rubén", "estatura" => 182, "sexo" => "M"]
    ];

    echo "<h1>DATOS SOBRE EL PERSONAL CON INDICE</h1>";

    // Con foreach
    echo "<h2>Con foreach</h2>";
    foreach ($persona2 as $clave => $valor) {
        echo "DNI: $clave <br> ";
        foreach ($valor as $clave2 => $valor2) {
            echo ucfirst($clave2) . ": $valor2 <br>";
        }
        echo "<hr>";
    }

    // Con foreach en una tabla
    echo "<h2>Con foreach en una tabla</h2>";
    echo "<table border='1'>";
    echo "<tr><th>DNI</th><th>Nombre</th><th>Estatura</th><th>Sexo</th></tr>";
    foreach ($persona2 as $clave => $valor) {
        echo "<tr>";
        echo "<td>$clave</td>";
        foreach ($valor as $clave2 => $valor2) {
            echo "<td>$valor2</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>


</body>

</html>