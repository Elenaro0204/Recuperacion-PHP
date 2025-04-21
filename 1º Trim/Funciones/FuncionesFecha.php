<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones Fecha</title>
</head>

<body>
    <?php
    checkdate($mes, $dia, $año); //devuelve true o false según la fecha sea correcta o no (para el mes y el día puede guardar 1 o 2 dígitos, y para el año 2 o 4 dígitos, sabiendo que con 2 dígitos los valores entre 00-69 hacen referencia a 2000-2069 y 70-99 a 1970-1999).  
    // Funcion date (formato [, fecha]): Devuelve un String con la fecha/hora formateada actual u opcionalmente, una indicada por parámetro en formato fecha (número entero correspondientes a los segundos transcurridos desde 1900). 
    $fecha = date("d/m/Y"); //La fecha de hoy es:02/09/2018 (el carácter ‘/’ se puede cambiar) 
    $fecha = date("j/n/y"); //La fecha de hoy es:2/9/18 (el carácter ‘/’ se puede cambiar) 
    $hora = date("H:i:s"); //La hora actual es:15:06:31 (el carácter ‘:’ se puede cambiar) 
    //   Caracteres dentro de la función date () con su aplicación práctica: 
    //   a -> Imprime “am” o “pm” 
    //   A -> “AM” o “PM” 
    //   h -> La hora en formato (01-12) 
    //   H -> Hora en formato 24 (00-23) 
    //   g -> Hora de 1 a 12 sin un cero delante 
    //   G -> Hora de 1 a 23 sin cero delante 
    //   i -> Minutos de 00 a 59 
    //   s -> Segundos de 00 a 59 
    //   d -> Día del mes (01 a 31) 
    //   j -> Día del mes sin cero (1 a 31) 
    //   w -> Día de la semana (0 a 6). El 0 es el domingo 
    //   m -> Mes actual (01 al 12) 
    //   n -> Mes actual sin ceros (1 a 12) 
    //   Y -> Año con 4 dígitos (2004) 
    //   y -> Año con 2 dígitos (04) 
    //   z -> Día del año (0 a 365) 
    //   t -> Número de días que tiene el mes actual 
    //   L -> 1 or 0, según si el año es bisiesto o no 
    //   Funcion time(): devuelve un entero que representa la fecha/hora actual del sistema 
    //   Funcion strtotime(cadena): convierte un string a fecha/hora (entero que representa un día/hora concreto) 
    echo "<br><b>Muestra la fecha y hora actual:</b> " . strtotime("now"); //Fecha y hora actual 
    echo "<br><b>Convierte el string en entero:</b> " . strtotime("10 September 2000"); // 10 de septiembre de 2000  
    echo "<br><b>Convierte el string en entero la fecha con el orden 9-15-21:</b> " . strtotime("9/15/21"); // 15 de septiembre de 2021 (Fíjate en el orden "m/d/Y" ) 
    echo "<br><b>Convierte el string en entero la fecha con el orden 2021-9-15:</b> " . strtotime("2021-9-15"); // 15 de septiembre de 2021 (Fíjate en el orden "y-m-d" o "d-m-y") 
    $dia = "02";
    $mes = "04";
    $año = "2004";
    echo "<br><b>Convierte el string en entero la fecha a partir de 3 variables:</b> " . strtotime("$mes/$dia/$año"); //fecha creada a partir de 3 variables (Fíjate en el orden) 
    echo "<br><b>Muestra la fecha y hora actual + 1 día:</b> " . strtotime("+1 day"); // actual + 1 dia 
    echo "<br><b>Muestra la fecha y hora actual + 1 semana:</b> " . strtotime("+1 week"); //actual + 1 semana 
    echo "<br><b>Muestra la fecha y hora actual + 1 semana, 2 días, 4 horas y 2 segundos:</b> " . strtotime("+1 week 2 days 4 hours 2 seconds"); //actual + 1 semana 2 días 4 hrs y 2 seg 
    echo "<br><b>Muestra la fecha del próximo jueves:</b> " . strtotime("next Thursday"); //próximo jueves 
    echo "<br><b>Muestra la fecha del último lunes:</b> " . strtotime("last Monday"); //ultimo lunes que hayamos pasado 

    // Sumar días, semanas, meses, años a una fecha 
    $fecha = "22-10-2021";
    // En las siguientes, $fecha se podría suprimir y por defecto tomaría la fecha actual
    echo "<br>" . $fecha;
    echo "<br><b>Muestra la fecha sumandole + 1 día:</b> " . date("d-m-Y", strtotime("$fecha + 1 days")); //sumo 1 día 
    echo "<br><b>Muestra la fecha sumandole + 1 semana:</b> " . date("d-m-Y", strtotime("$fecha + 1 week")); //sumo 1 semana 
    echo "<br><b>Muestra la fecha sumandole + 1 mes:</b> " . date("d-m-Y", strtotime("$fecha + 1 month")); //sumo 1 mes 
    echo "<br><b>Muestra la fecha sumandole + 1 año:</b> " . date("d-m-Y", strtotime("$fecha + 1 year")); //sumo 1 año 
    // Comparar fechas: Las fechas tienen que ser comparadas en formato fecha UNIX(entero) y si además no quiero tener en cuenta la hora, debo formatearla previamente para establecer la hora a cero. 
    echo "<br><b>Compara las fechas en formato UNIX:</b> ";
    $fecha_actual = strtotime(date("d-m-Y 00:00:00", time())); //fecha y hora actual pero con hora a 0 
    $fecha_entrega = strtotime("22-11-2024 00:00:00");
    if ($fecha_actual > $fecha_entrega) {
        echo "<br>El plazo de entrega todavía no ha finalizado";
    } else {
        echo "<br>El plazo de entrega ya ha finalizado";
    }
    ?>
</body>

</html>