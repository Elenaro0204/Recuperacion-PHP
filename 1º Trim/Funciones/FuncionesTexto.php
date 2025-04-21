<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones Texto</title>
</head>

<body>
    <?php
    strcmp($cadena1, $cadena2); //devuelve 0 si son iguales 1 si cadena1 mayor y -1 si es menor en orden alfabético según código ASCII (todas las mayúsculas están antes que todas las minúsculas) 
    $saludo = "Hola, estamos trabajando con cadenas"; //la posición del primer carácter es 0

    echo "<br><b>Todo en minúsculas:</b> " . strtolower($saludo);
    echo "<br><b>Todo en mayúsculas:</b> " . strtoupper($saludo);
    echo "<br><b>Primera letra mayuscula:</b> " . ucfirst($saludo);
    echo "<br><b>Primeras palabras mayúsculas:</b> " . ucwords($saludo);
    echo "<br><b>Eliminamos espacios:</b> " . trim($saludo);
    echo "<br><b>Repetimos la cadena:</b> " . str_repeat($saludo, 5);
    echo "<br><b>Contamos los caracteres:</b> " . strlen($saludo);
    echo "<br><b>Busqueda de cadenas:</b> " . strstr($saludo, 'la'); //devuelve la cadena donde la encuentre hasta el final 
    echo "<br><b>Remplazando cadenas:</b> " . str_replace(["Hola", "Buenas", "Hello"], "Adios", $saludo); //sustituye una o varias cadenas de un array por otra cadena 
    echo "<br><b>Extraer cadenas:</b> " . substr($saludo, 2, 8); //extrae desde la posición 2 hasta la 10 (2+8 caracteres), si se omite la cantidad de caracteres extrae hasta el final. Si la posición inicial se indica en negativo se cuenta desde el final de la cadena hacia atrás (-1 es la última posición) 
    echo "<br><b>Devuelve posición primera ocurrencia:</b> " . mb_stripos($saludo, "estamos"); //si no encuentra devuelve false 
    echo "<br><b>Devuelve posición primera ocurrencia:</b> " . strpos($saludo, "estamos"); //si no encuentra devuelve cadena vacia 
    echo "<br><b>Devuelve posición última ocurrencia:</b> " . strrpos($saludo, "estamos"); //si no encuentra devuelve cadena vacia 
    echo "<br><b>Voltea un string dado:</b> " . strrev($saludo); //voltea o invierte una cadena 

    $palabra = "Hola";
    echo "<br><b>Comprueba si la cadena empieza por una palabra:</b> " . str_starts_with($saludo, $palabra); //  devuelve true o false si la cadena comienza o no con la palabra 
    echo "<br><b>Comprueba si la cadena ternmina por una palabra:</b> " . str_ends_with($saludo, $palabra); //  devuelve true o false si la cadena finaliza o no con la palabra 

    echo "<br><b>Comprueba si la cadena contiene un patrón:</b> " . preg_match("/patron/i", $saludo); //devuelve 0 si no encuentra o 1 si encuentra el patrón del string en 
    // $saludo; sin distinguir mayúsculas, si se quita la i, si distingue mayúsculas y minúsculas. El patrón se define como una expresión regular con caracteres comodín: 
    // “.” 1 solo carácter cualquiera excepto “\n” 
    // “?” 0 o 1 ocurrencias del carácter que le precede 
    // “*” cero o más ocurrencias del carácter que le precede 
    // “+” una o más ocurrencias del carácter que le precede 
    // “^” comienza por esa cadena, con “/^patron/m” da nº de líneas coincidentes 
    // “$” termina por esa cadena con “/$patron/m” da nº de líneas coincidentes 
    // “[lista de caracteres]” 1 solo carácter de los de la lista (sin separadores) 
    // “[^lista de caracteres]” 1 carácter que no sea ninguno de la lista (sin separadores) 
    // Explicado en url: https://diego.com.es/expresiones-regulares-en-php 


    // ord(string): devuelve el código ASSCII del primer carácter de la cadena pasada por parámetro 
    // chr(código ascii): devuelve el carácter correspondiente al código ascii pasado por parámetro
    $array = str_split($saludo); // devuelve un array con cada carácter en una posición 
    echo "<br><b>Devuelve un array con cada carácter en una posición:</b> ";
    foreach ($array as $letra) {
        echo $letra . "-";
    }
    // Un string puede ser tratado como un array, donde cada carácter de la cadena se encuentra en una posición comenzando en 0.  
    $s = "cadena de texto";
    echo "<br><b>Convierte una dcadena de texto en un array:</b> ";
    for ($i = 0; $i < strlen($s); $i++) {
        echo $s[$i] . "-";
    }
    // nl2br: imprime una cadena con los saltos de línea (si imprimimos un string con saltos de línea necesitamos usar esta función si queremos que se produzca un <br> por cada salto de línea en la página web). Ejemplo: echo nl2br($cadena);  
    ?>
</body>

</html>