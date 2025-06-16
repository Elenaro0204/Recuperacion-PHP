<?php
header('Content-Type: application/json; charset=utf-8');

$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
$respuesta = null;

if ($metodo !== 'GET') {
    $mensaje = "Método no permitido. Usa GET.";
    $codEstado = 405;
    enviarRespuesta($codEstado, $mensaje, null);
    exit;
}

// Comprobar parámetro 'num'
if (!isset($_GET['num'])) {
    $mensaje = "Falta parámetro 'num' con número de cartas.";
    $codEstado = 400;
    enviarRespuesta($codEstado, $mensaje, null);
    exit;
}

$num = intval($_GET['num']);

if ($num < 1 || $num > 40) {
    $mensaje = "Número de cartas inválido. Debe ser entre 1 y 40.";
    $codEstado = 400;
    enviarRespuesta($codEstado, $mensaje, null);
    exit;
}

// Baraja española (sin comodines)
$palos = ['oros', 'copas', 'espadas', 'bastos'];
$figuras = [1,2,3,4,5,6,7,10,11,12]; // figuras típicas de la baraja española (1 = As)

// Crear el mazo completo
$mazo = [];
foreach ($palos as $palo) {
    foreach ($figuras as $figura) {
        $mazo[] = ['palo' => $palo, 'figura' => $figura];
    }
}

// Barajar y coger las primeras $num cartas sin repetir
shuffle($mazo);
$seleccionadas = array_slice($mazo, 0, $num);

enviarRespuesta(200, "Cartas generadas correctamente", $seleccionadas);


function enviarRespuesta($codEstado, $mensaje, $datos) {
    header("HTTP/1.1 $codEstado $mensaje");
    echo json_encode([
        'mensaje' => $mensaje,
        'datos' => $datos
    ], JSON_UNESCAPED_UNICODE);
}
