<?php
// Inicio de sesión
if (session_status() == PHP_SESSION_NONE) session_start();

// Función para establecer la cookie con una duración de 3 meses
function setEncuestaCookie($valor1, $valor2)
{
    $expiracion = time() + (3 * 30 * 24 * 60 * 60); // 3 meses en segundos
    setcookie('encuesta_votos', serialize([$valor1, $valor2]), $expiracion);
}

// Verificar y actualizar votos según la opción seleccionada
if (!isset($_SESSION['votos_opcion1'])) {
    $_SESSION['votos_opcion1'] = 0;
}
if (!isset($_SESSION['votos_opcion2'])) {
    $_SESSION['votos_opcion2'] = 0;
}

if (isset($_REQUEST['opcion'])) {
    if ($_REQUEST['opcion'] == 1) {
        $_SESSION['votos_opcion1']++;
    } elseif ($_REQUEST['opcion'] == 2) {
        $_SESSION['votos_opcion2']++;
    }

    // Guardar en la cookie
    setEncuestaCookie($_SESSION['votos_opcion1'], $_SESSION['votos_opcion2']);
}

// Función para obtener votos de la cookie si existe
function getEncuestaVotosFromCookie()
{
    if (isset($_COOKIE['encuesta_votos'])) {
        $votos = unserialize($_COOKIE['encuesta_votos']);
        return $votos;
    }
    return [0, 0];
}

// Obtener votos actuales
list($votos_opcion1, $votos_opcion2) = getEncuestaVotosFromCookie();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 Sesiones</title>
    <style>
        .barra {
            width: 300px;
            height: 20px;
            background-color: #f2f2f2;
            margin-bottom: 20px;
            border-radius: 5px;
            overflow: hidden;
        }

        .barra-verde {
            height: 100%;
            background-color: green;
            text-align: center;
            line-height: 20px;
            color: white;
        }

        .barra-azul {
            height: 100%;
            background-color: blue;
            text-align: center;
            line-height: 20px;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Ejercicio 2</h1>
    <p>Crear una página que simula una encuesta. Se realizará una pregunta, con dos botones para responder, cada
        vez que se pulse un botón se irán contabilizando (usa sesiones) los votos y actualizando una barra que muestre
        el número de votos de cada respuesta. Este resultado se irá almacenando también en una cookie, de manera que
        si se cierra el navegador, al abrir la página de nuevo se mostrarán los resultados hasta el momento en que se
        cerró. Crear la cookie para 3 meses.</p>

    <h2>Encuesta</h2>
    <p>¿Qué opción prefieres?</p>

    <form action="" method="post">
        <label for="opcion1">Pizza</label>
        <input type="radio" id="opcion1" name="opcion" value="1">
        <br>
        <label for="opcion2">Hamburguesa</label>
        <input type="radio" id="opcion2" name="opcion" value="2">
        <br>
        <input type="submit" value="Votar">
    </form>

    <h3>Resultados:</h3>

    <div>
        <strong>Pizza (<?php echo $votos_opcion1; ?> votos)</strong>
        <div class="barra">
            <div class="barra-verde"><?php echo round(($votos_opcion1 + $votos_opcion2) > 0 ? ($votos_opcion1 / ($votos_opcion1 + $votos_opcion2) * 100) : 0); ?>%</div>
        </div>
    </div>

    <div>
        <strong>Hamburguesa (<?php echo $votos_opcion2; ?> votos)</strong>
        <div class="barra">
            <div class="barra-azul"><?php echo round(($votos_opcion1 + $votos_opcion2) > 0 ? ($votos_opcion2 / ($votos_opcion1 + $votos_opcion2) * 100) : 0); ?>%</div>
        </div>
    </div>

</body>

</html>