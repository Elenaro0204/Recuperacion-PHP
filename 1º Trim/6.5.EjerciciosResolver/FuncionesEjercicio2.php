<?php
// Función para obtener la matriz de coordenadas según el perfil
function dameTarjeta($perfil)
{
    if ($perfil == 'admin') {
        $tarjeta = [
            1 => ['A' => '111', 'B' => '222', 'C' => '333', 'D' => '444', 'E' => '555'],
            2 => ['A' => '121', 'B' => '232', 'C' => '343', 'D' => '454', 'E' => '515'],
            3 => ['A' => '212', 'B' => '323', 'C' => '545', 'D' => '151', 'E' => '123'],
            4 => ['A' => '122', 'B' => '233', 'C' => '344', 'D' => '455', 'E' => '511'],
            5 => ['A' => '112', 'B' => '223', 'C' => '334', 'D' => '445', 'E' => '551'],
        ];
    } elseif ($perfil == 'estandar') {
        $tarjeta = [
            1 => ['A' => '000', 'B' => '666', 'C' => '777', 'D' => '888', 'E' => '999'],
            2 => ['A' => '060', 'B' => '676', 'C' => '787', 'D' => '898', 'E' => '909'],
            3 => ['A' => '606', 'B' => '767', 'C' => '878', 'D' => '989', 'E' => '090'],
            4 => ['A' => '066', 'B' => '677', 'C' => '788', 'D' => '899', 'E' => '900'],
            5 => ['A' => '006', 'B' => '667', 'C' => '778', 'D' => '889', 'E' => '990'],
        ];
    } else {
        $tarjeta = null;
    }

    return $tarjeta;
}

// Función para verificar si la clave es correcta en la matriz de coordenadas
function compruebaClave($matriz, $fila, $columna, $valor)
{
    // Normalizamos la columna a mayúsculas por si se escribió en minúscula
    $columna = strtoupper($columna);

    // Verificamos que la fila y columna existan y que el valor coincida
    return isset($matriz[$fila][$columna]) && $matriz[$fila][$columna] === $valor;
}

// Función para imprimir una tarjeta como tabla HTML
function imprimeTarjeta($tarjeta)
{
    $html = '<table border="1" cellpadding="5"><tr><th></th>';

    // Cabecera de columnas: A B C D E
    foreach (['A', 'B', 'C', 'D', 'E'] as $col) {
        $html .= "<th>$col</th>";
    }
    $html .= '</tr>';

    // Filas numeradas del 1 al 5
    for ($i = 1; $i <= 5; $i++) {
        $html .= "<tr><th>$i</th>";
        foreach (['A', 'B', 'C', 'D', 'E'] as $col) {
            $html .= '<td>' . $tarjeta[$i][$col] . '</td>';
        }
        $html .= '</tr>';
    }

    $html .= '</table>';
    return $html;
}

