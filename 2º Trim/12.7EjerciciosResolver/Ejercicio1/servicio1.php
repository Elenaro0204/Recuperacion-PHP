<?php
define('EURO_A_PESETA', 166.386);

header('Content-Type: application/json; charset=utf-8');

$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
$respuesta = null;

if ($metodo === 'GET') {
    if (!isset($_REQUEST['cantidad']) || !isset($_REQUEST['moneda'])) {
        $mensaje = "Faltan parámetros. Usa cantidad y moneda (euros o pesetas).";
        $codEstado = 400;
    } else {
        $cantidad = floatval($_REQUEST['cantidad']);
        $moneda = strtolower($_REQUEST['moneda']);

        if ($cantidad <= 0) {
            $mensaje = "Cantidad debe ser un número positivo.";
            $codEstado = 400;
        } else {
            switch ($moneda) {
                case 'euros':
                    $resultado = $cantidad * EURO_A_PESETA;
                    $respuesta = [
                        'cantidad_original' => $cantidad,
                        'moneda_original' => 'euros',
                        'cantidad_convertida' => round($resultado, 2),
                        'moneda_convertida' => 'pesetas'
                    ];
                    break;

                case 'pesetas':
                    $resultado = $cantidad / EURO_A_PESETA;
                    $respuesta = [
                        'cantidad_original' => $cantidad,
                        'moneda_original' => 'pesetas',
                        'cantidad_convertida' => round($resultado, 2),
                        'moneda_convertida' => 'euros'
                    ];
                    break;

                default:
                    $mensaje = 'Moneda desconocida. Usa "euros" o "pesetas".';
                    $codEstado = 400;
                    break;
            }
        }
    }
} else {
    $mensaje = "Método no permitido. Usa GET.";
    $codEstado = 405;
}

setCabecera($codEstado, $mensaje);

echo json_encode($respuesta ?? ['error' => $mensaje]);

function setCabecera($codEstado, $mensaje)
{
    header("HTTP/1.1 $codEstado $mensaje");
    header("Content-Type: application/json;charset=utf-8");
}
