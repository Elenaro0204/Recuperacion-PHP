<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 Arrays</title>
</head>

<body>
    <h1>Ejercicio 4</h1>
    <p>Vamos a realizar una página para generar parejas compatibles según su sexo y orientación
        sexual. Para ello en una primera página pediremos de manera reiterada el nombre, sexo (h o
        m) y orientación (heterosexual, homosexual o bisexual) de personas, que se irán almacenando
        en un array. Se dispondrá además, de un botón para pasar a la segunda página que permite
        generar las parejas con las personas introducidas.
        En esta segunda página se mostrará un listado en una tabla con todas las personas introducidas
        y en la última columna debe haber un botón para seleccionar la persona, lo que provocará la
        recarga de la página, quedando la persona seleccionada de un color distinto y además tras
        seleccionar a la persona, junto a la primera tabla debe aparecer otra tabla con las personas
        compatibles con la persona seleccionada. En esta segunda tabla de personas compatibles, en
        la última columna debe haber un botón para formar la pareja (la primera persona elegida junto
        con la seleccionada de la segunda tabla) y se enviarán las dos personas seleccionadas a una
        tercera página que mostrará la información de la pareja formada.
        Para las compatibilidades se tendrá en cuenta lo siguiente:
        -Una persona heterosexual será compatible con alguien de sexo distinto no homosexual.
        -Una persona homosexual será compatible con alguien de mismo sexo no heterosexual
        -Una persona bisexual será compatible con cualquiera menos heterosexual del mismo sexo u
        homosexual de sexo distinto.
        Nota: El array de personas puede tener la siguiente estructura (se recomienda inicializar el array
        con datos para mayor comodidad en las pruebas):
        $personas= [['nombre'=>'Anita','sexo'=>'m','orientacion'=>'bis'],
        ['nombre'=>'Lolita','sexo'=>'m','orientacion'=>'bis'],
        ['nombre'=>'Pepito','sexo'=>'h','orientacion'=>'bis'],
        ['nombre'=>'Juanito','sexo'=>'h','orientacion'=>'bis'],
        ['nombre'=>'Roberto','sexo'=>'h','orientacion'=>'het'],
        ['nombre'=>'Antonio','sexo'=>'h','orientacion'=>'het'],
        ['nombre'=>'Manuela','sexo'=>'m','orientacion'=>'het'],
        ['nombre'=>'Isabel','sexo'=>'m','orientacion'=>'het'],
        ['nombre'=>'Jenifer','sexo'=>'m','orientacion'=>'hom'],
        ['nombre'=>'Susan','sexo'=>'m','orientacion'=>'hom'],
        ['nombre'=>'Peter','sexo'=>'h','orientacion'=>'hom'],
        ['nombre'=>'Mike','sexo'=>'h','orientacion'=>'hom']];
    </p>

    <?php
    if (!isset($_REQUEST['personas'])) {
        $personas = [
            ['nombre' => 'Anita', 'sexo' => 'm', 'orientacion' => 'bis'],
            ['nombre' => 'Lolita', 'sexo' => 'm', 'orientacion' => 'bis'],
            ['nombre' => 'Pepito', 'sexo' => 'h', 'orientacion' => 'bis'],
            ['nombre' => 'Juanito', 'sexo' => 'h', 'orientacion' => 'bis'],
            ['nombre' => 'Roberto', 'sexo' => 'h', 'orientacion' => 'het'],
            ['nombre' => 'Antonio', 'sexo' => 'h', 'orientacion' => 'het'],
            ['nombre' => 'Manuela', 'sexo' => 'm', 'orientacion' => 'het'],
            ['nombre' => 'Isabel', 'sexo' => 'm', 'orientacion' => 'het'],
            ['nombre' => 'Jenifer', 'sexo' => 'm', 'orientacion' => 'hom'],
            ['nombre' => 'Susan', 'sexo' => 'm', 'orientacion' => 'hom'],
            ['nombre' => 'Peter', 'sexo' => 'h', 'orientacion' => 'hom'],
            ['nombre' => 'Mike', 'sexo' => 'h', 'orientacion' => 'hom']
        ];
    } else {
        $personas = unserialize(base64_decode($_REQUEST['personas']));
        if (isset($_REQUEST['nueva'])) {
            $personas[] = $_REQUEST['nueva'];
        }
    }
    ?>
    <div style="width: 500px; margin:auto; ">
        <h1>Cupido ha llegado a la web</h1>
        <form action="" method="post">
            <fieldset>
                <legend>Añadir personas a la Base de datos</legend>
                <br>
                <strong>NOMBRE</strong>
                <input type="text" name="nueva[nombre]"> 
                <br>
                <hr>
                <strong>SEXO</strong>
                <input type="radio" name="nueva[sexo]" value="h">Hombre
                <input type="radio" name="nueva[sexo]" value="m">Mujer 
                <br>
                <hr>
                <strong>ORIENTACIÓN</strong>
                <input type="radio" name="nueva[orientacion]" value="het">Heterosexual
                <input type="radio" name="nueva[orientacion]" value="hom">Homosexual
                <input type="radio" name="nueva[orientacion]" value="bis">Bisexual
                <br>
                <hr>
                <input type="hidden" name="personas" value=<?= base64_encode(serialize($personas)) ?>>
                <input type="submit" value="AÑADIR PERSONA">
                <br><br>
            </fieldset>
        </form>
        <br><br>
        <form action="Ejercicio4_tabla.php" method="post">
            <fieldset>
                <legend>Pasar a ver el listado de personas</legend>
                <br>
                <input type="hidden" name="personas" value=<?= base64_encode(serialize($personas)) ?>>
                <input type="submit" value="VER LISTADO">
                <br><br>
            </fieldset>
        </form>
        <br><br>
        <form action="Ejercicio4_parejas.php" method="post">
            <fieldset>
                <legend>Pasar a generar parejas amorosas</legend>
                <br>
                <input type="hidden" name="personas" value=<?= base64_encode(serialize($personas)) ?>>
                <input type="submit" value="CUPIDO ENTRA EN ACCIÓN">
                <br><br>
            </fieldset>
        </form>
    </div>

</body>

</html>