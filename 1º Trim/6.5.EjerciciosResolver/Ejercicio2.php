<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 Funciones</title>
    <style>
        h5{
            color: red;
        }

        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Ejercicio 2 Funciones</h1>
    <p>Disponemos de 2 tarjetas de coordenadas para controlar el acceso a una web. Cada tarjeta corresponde a un
        perfil de usuario ‘admin’ o ‘estandar’, cada número número registrado en la tarjeta se identifica por su fila (de
        la 1 a la 5) y su columna (de la A a la E). Los valores registrados en cada tarjeta son fijos y os lo podéis inventar.
        Crea una página principal que sirva de control de acceso a una segunda página. Se pedirá el perfil de usuario
        (admin o estándar) y una clave aleatoria correspondiente a la tarjeta de coordenadas de su perfil (fila y
        columna), se comprobará si es correcto usando 2 funciones: dameTarjeta() a la que se le pasa el perfil y
        devuelve una matriz correspondiente a la tarjeta de coordenadas de ese perfil, y compruebaClave() a la que se
        le pasa la matriz de coordenadas, las coordenadas y un valor, y devolverá un booleano según sea correcto el
        valor en la matriz de coordenadas. Ambas funciones estarán almacenadas en una librería controlAcceso.php.
        Si el usuario se ha identificado correctamente se muestra un enlace de acceso a la página protegida (cualquiera)
        y si no mostrará un enlace para volver a intentarlo de nuevo.
        Usar una tercera función imprimeTarjeta() que recibe una tarjeta y devuelve el código html correspondiente a
        una tabla con el el valor de todas las coordenadas. (imprimir las tarjetas de cada perfil en la página de acceso
        para poder comprobar el correcto funcionamiento de la página)</p>

    <h2>Control de Acceso</h2>

    <?php
    // Incluir el archivo de funciones
    require_once 'FuncionesEjercicio2.php';

    // Definir las opciones de columna y fila
    $arrayFila = range(1, 5); // Filas del 1 al 5
    $arrayColumna = ['A', 'B', 'C', 'D', 'E']; // Columnas de A a E

    // Generar valores aleatorios para fila y columna
    $filaGenerada = $arrayFila[array_rand($arrayFila)];
    $columnaGenerada = $arrayColumna[array_rand($arrayColumna)];

    // Mostrar el formulario de acceso y las tarjetas
    $tarjetaAdmin = dameTarjeta('admin');
    $tarjetaEstandar = dameTarjeta('estandar');
    ?>

    <h3>Tarjetas de Coordenadas</h3>
    <div style="display: flex; gap: 40px;">
        <div>
            <h4>Admin</h4>
            <?php echo imprimeTarjeta($tarjetaAdmin); ?>
        </div>

        <div>
            <h4>Usuario Estandar</h4>
            <?php echo imprimeTarjeta($tarjetaEstandar); ?>
        </div>
    </div>


    <h3>Formulario</h3>
    <form method="post">
        <label for="perfil"><b>Perfil:</b></label>
        <select name="perfil" id="perfil">
            <option value="admin">Admin</option>
            <option value="estandar">Estandar</option>
        </select><br>

        <!-- Se genera un valor aleatorio de fila y de columna, el usuario tiene que introducir el valor que corresponde a esas coordenadas. 
         Estos se mandan de forma hidden para comprobarlo -->
        <!-- <label for="fila">Fila:</label>
        <input type="number" name="fila" id="fila" min="1" max="5" required><br><br>

        <label for="columna">Columna:</label>
        <select name="columna" id="columna" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select><br><br> -->

        <!-- Se generan valores aleatorios de fila y columna -->
        <label for="fila"><b>Fila:</b> <?php echo $filaGenerada; ?></label>
        <input type="hidden" name="fila" value="<?php echo $filaGenerada; ?>"><br>

        <label for="columna"><b>Columna:</b> <?php echo $columnaGenerada; ?></label>
        <input type="hidden" name="columna" value="<?php echo $columnaGenerada; ?>"><br>

        <label for="valor"><b>Introduce el valor de las coordenadas:</b></label>
        <input type="text" name="valor" id="valor" required><br><br>

        <input type="submit" value="Acceder">
    </form>

    <?php
    // Procesar el formulario si se ha enviado
    if (isset($_REQUEST['perfil'])) {
        $perfil = $_POST['perfil'];
        $fila = $_POST['fila'];
        $columna = $_POST['columna'];
        $valor = $_POST['valor'];

        // Obtener la matriz de coordenadas según el perfil
        $matriz = dameTarjeta($perfil);

        // Comprobar si la clave es correcta
        $accesoCorrecto = compruebaClave($matriz, $fila, $columna, $valor);

        // Mostrar mensaje según acceso correcto o no
        if ($accesoCorrecto) {
            echo '<h5>¡Acceso concedido!</h5>';
            echo '<a href="PaginaProtegida.php">Acceder a la página protegida</a>';
        } else {
            echo '<h5>Acceso denegado. Intenta de nuevo.</h5>';
            echo '<a href="Ejercicio2.php">Volver a intentarlo</a>';
        }
    }
    ?>

</body>

</html>