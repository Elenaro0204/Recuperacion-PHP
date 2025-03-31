<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Clase</title>
</head>

<body>
    <!-- Ejercicio 1 -->
    <h1>Ejercicio 1</h1>
    <!-- Con indice definido -->
    <h3>Con indice definido (Array asociativo)</h3>
    <form action="#" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="datos[nombre]" required><br>
        <label for="estatura">Estatura:</label>
        <input type="text" id="estatura" name="datos[estatura]" required><br>
        <label for="sexo">Sexo:</label>
        <input type="text" id="sexo" name="datos[sexo]" required><br>
        <label for="patinar">Patinar:</label>
        <input type="checkbox" id="patinar" name="hobbies[patinar]"><br>
        <label for="futbol">Futbol:</label>
        <input type="checkbox" id="futbol" name="hobbies[futbol]"><br>
        <label for="natacion">Natacion:</label>
        <input type="checkbox" id="natacion" name="hobbies[natacion]"><br>

        <!-- Almacenamos los dats en hidden para añadir datos al array sin sobrescribirlo -->
        <!-- <input type="hidden" name="datos" value='<?= $cadenaDatos ?>'> -->

        <button type="submit">Enviar</button>
    </form>

    <!-- Con indice NO definido -->
    <h3>Con indice NO definido (Array indexado)</h3>
    <form action="#" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="datos[]" required><br>
        <label for="estatura">Estatura:</label>
        <input type="text" id="estatura" name="datos[]" required><br>
        <label for="sexo">Sexo:</label>
        <input type="text" id="sexo" name="datos[]" required><br>
        <button type="submit">Enviar</button>
    </form>

    <?php
    if (isset($_POST['datos'])) {
        $datos = $_REQUEST['datos'];
        $hobbies = $_REQUEST['hobbies'];
    ?>
        <h2>DATOS SOBRE EL PERSONAL</h2>
    <?php
        // Mostrados en una lista
        echo "<h3>En una lista</h3>";
        foreach ($datos as $clave => $valor) {
            echo ucfirst($clave) . ": " . $valor . "<br>";
        }
        foreach ($hobbies as $clave => $valor) {
            echo "Hobbies: " . ucfirst($clave) . "<br>";
        }
        // Mostrados en una tabla
        echo "<h3>En una tabla</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Estatura</th><th>Sexo</th><th>Hobbies</th></tr>";

        foreach ($datos as $valor) { // $valor representa cada persona en $datos
            echo "<tr>";
            echo "<td>" . $datos['nombre'] . "</td>";
            echo "<td>" . $datos['estatura'] . "</td>";
            echo "<td>" . $datos['sexo'] . "</td>";

            // Verifica si existen hobbies y los muestra correctamente en una celda
            echo "<td>";
            foreach ($hobbies as $clave => $valor) {
                echo ucfirst($clave);
            }
            echo "</td>";

            echo "</tr>";
        }

        echo "</table>";
    }
    ?>

    <!-- Ejercicio 2 -->
    <h1>Ejercicio 2</h1>
    <?php
    if (isset($_POST['n'])) {
        $contadorNumeros = $_POST['contadorNumeros'];
        $numeroTexto = $_POST['numeroTexto'] . " " . $_POST['n'];
    } else {
        $contadorNumeros = 0;
        $numeroTexto = "";
    }
    // Muestra los números introducidos 
    if ($contadorNumeros == 6) {
        $numeroTexto = substr($numeroTexto, 1); // quita el primer espacio 
        $numero = explode(" ", $numeroTexto);
        echo "Los números introducidos son: ";
        foreach ($numero as $n) {
            echo $n, " ";
        }
    } else {
    ?>
        <form action="#" method="post">
            Introduzca un número:
            <input type="number" name="n" autofocus>
            <input type="hidden" name="contadorNumeros" value="<?= ++$contadorNumeros ?>">
            <input type="hidden" name="numeroTexto" value="<?= $numeroTexto ?>">
            <input type="submit" value="OK">
        </form>
    <?php
    }
    ?>
</body>

</html>