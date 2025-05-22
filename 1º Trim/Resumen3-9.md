## 🧠 CHULETA PHP – Temas 3 al 9

---

### 🟨 **Tema 3 – Condicionales (`if`, `switch`)**

#### ✅ Estructuras:

- **Estructura básica:**

```php
if ($x > 0) {
  echo "Positivo";
} elseif ($x < 0) {
  echo "Negativo";
} else {
  echo "Cero";
}
```

- **Ternario:**

```php
$estado = ($nota >= 5) ? "Aprobado" : "Suspenso";
```

- **Operadores:**

> - Comparación: `==`, `===`, `!=`, `<`, `>`, `<=`, `>=`
> - Lógicos: `&&`, `||`, `!`

- **`switch`:**

```php
switch ($dia) {
  case "lunes":
    echo "Lengua";
    break;
  case "martes":
    echo "Mates";
    break;
  default:
    echo "Libre";
}
```

#### ✅ Operadores:

- Comparación: `==`, `===`, `!=`, `<`, `>`, `<=`, `>=`, `<=>`
- Lógicos: `&&`, `||`, `!`, `and`, `or`

#### ✅ Funciones del libro:

- No se define ninguna función nativa específica en este tema.
- Se utilizan expresiones lógicas, operadores y estructuras condicionales.

---

### 🔁 **Tema 4 – Bucles (`for`, `while`, `do-while`)**

#### ✅ Tipos de bucles:

- **`for`**:

```php
for ($i = 0; $i < 10; $i++) {
  echo $i;
}
```

- **`while`**:

```php
$i = 0;
while ($i < 10) {
  echo $i;
  $i++;
}
```

- **`do-while`**:

```php
$i = 0;
do {
  echo $i;
  $i++;
} while ($i < 10);
```

- **Carga reiterada con formularios (ej. adivina el número)**:

> - Se usan `input type="hidden"` y recargas de página para mantener estado.

---

#### ✅ Funciones usadas en el libro:

- `rand(min, max)` → número aleatorio (muy usada en juegos como “adivina el número”)
- `echo` → para mostrar valores dentro de los bucles

---

### 📦 **Tema 5 – Arrays (clásicos, asociativos y bidimensionales)**

#### ✅Tipos de Arrays

- **Array clásico:**

```php
$colores = ["rojo", "azul"];
echo $colores[0];
```

- **Array asociativo:**

```php
$edades = ["Juan" => 22, "Ana" => 19];
echo $edades["Ana"];
```

- **Array bidimensional:**

```php
$personas = [
  ["nombre" => "Luis", "edad" => 20],
  ["nombre" => "Ana", "edad" => 18]
];
echo $personas[0]["nombre"];
```

- **`foreach`:**

```php
foreach ($colores as $color) {
  echo $color;
}
```

- **Extra:**

> - `count($array)` → número de elementos
> - `explode(" ", $cadena)` → de string a array

#### ✅ Funciones nativas mencionadas:

- `count($array)` → número de elementos
- `explode(" ", $cadena)` → string a array
- `implode(" ", $array)` → array a string
- `substr($str, start)` → parte de string
- `rand()` → números aleatorios
- `var_dump($array)` → muestra estructura del array

#### ✅ Funciones propias del libro:

**Unidimensionales:**

- `generaArrayInt($n, $min, $max)`
- `minimoArrayInt($array)`
- `maximoArrayInt($array)`
- `mediaArrayInt($array)`
- `estaEnArrayInt($array, $n)`
- `posicionEnArray($array, $n)`
- `volteaArrayInt($array)`
- `rotaDerechaArrayInt($array, $n)`
- `rotaIzquierdaArrayInt($array, $n)`

**Bidimensionales:**

- `generaArrayBiInt($n, $m, $min, $max)`
- `filaDeArrayBiInt($array, $i)`
- `columnaDeArrayBiInt($array, $j)`
- `coordenadasEnArrayBiInt($array, $n)`
- `esPuntoDeSilla($array, $fila, $col)`
- `diagonal($array, $fila, $col, $direccion)`

---

### ⚙️ **Tema 6 – Funciones**

#### ✅ Cómo definir:

```php
function nombre($param1, $param2 = 0) {
  return $param1 + $param2;
}
```

#### ✅ Funciones propias que aparecen en el libro:

- `esPrimo($n)`
- `voltea($n)`
- `esCapicua($n)`
- `siguientePrimo($n)`
- `digitos($n)`
- `posicionDeDigito($n, $d)`
- `factorial($n)`
- `opera($x, $y = null, $z = null)` → simula sobrecarga con parámetros opcionales

#### ✅Librerías:

```php
include("misFunciones.php");
```

#### ✅Funciones para cadenas de texto:

```php
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

```

#### ✅Funciones para Fechas:

```php
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
```

---

### 🍪 **Tema 7 – Sesiones y Cookies**

#### ✅ Sesiones:

```php
if (session_status() == PHP_SESSION_NONE) session_start();
$_SESSION["usuario"] = "Elena";
echo $_SESSION["usuario"];
```

#### ✅ Cookies:

```php
setcookie("color", "azul", time() + 3600);
```

#### ✅ Funciones del libro:

- `session_start()`
- `isset($_SESSION['clave'])`
- `setcookie(nombre, valor, tiempo)`
- `isset($_COOKIE['clave'])`

A veces es necesario **guardar estructuras más complejas (arrays, objetos...) en la sesión**. Para eso se usan:

```php
// Guardar un array serializado en la sesión
session_start();
$carrito = ["producto1" => 2, "producto2" => 1];
$_SESSION["carrito"] = serialize($carrito);
```

```php
// Recuperarlo más adelante
session_start();
$carrito = unserialize($_SESSION["carrito"]);
echo $carrito["producto1"]; // 2
```

✅ **Funciones**:

- `serialize($var)` → convierte un objeto o array en una cadena para guardarla.
- `unserialize($cadena)` → convierte esa cadena de nuevo en su estructura original.

📌 Muy útil para guardar arrays en cookies o sesiones sin perder su estructura.

---

### 📁 **Tema 8 – Ficheros**

#### ✅ Leer:

```php
$f = fopen("archivo.txt", "r");
while (!feof($f)) {
  echo fgets($f);
}
fclose($f);
```

#### ✅ Escribir:

```php
$f = fopen("archivo.txt", "w");
fwrite($f, "Hola mundo");
fclose($f);
```

#### ✅ Añadir sin borrar:

```php
$f = fopen("archivo.txt", "a");
fwrite($f, "Nueva línea");
fclose($f);
```

#### ✅ Extras:

- `file_exists("archivo.txt")`
- `file_get_contents("archivo.txt")`
- `file_put_contents("archivo.txt", "contenido")`

#### ✅ Funciones del libro:

- `fopen("archivo.txt", "r/w/a")` → abrir fichero
- `fclose($fichero)`
- `fgets($fichero)` → leer línea
- `fwrite($fichero, "texto")` → escribir
- `feof($fichero)` → fin del archivo
- `file_exists("archivo.txt")` → comprobar si existe
- `file_get_contents()`, `file_put_contents()` → lectura/escritura rápida
- `unlink("archivo.txt")` → borrar fichero

---

### 🧱 **Tema 9 – Programación Orientada a Objetos (POO)**

#### ✅ Clase y objeto:

```php
class Persona {
  public $nombre;
  public function saluda() {
    return "Hola " . $this->nombre;
  }
}

$p = new Persona();
$p->nombre = "Ana";
echo $p->saluda();
```

#### ✅ Herencia:

```php
class Estudiante extends Persona {
  public $curso;
}
```

#### ✅ Métodos y atributos estáticos:

```php
class Util {
  public static function saluda() {
    return "¡Hola!";
  }
}
echo Util::saluda();
```

#### ✅ Serialización:

```php
$cadena = serialize($objeto);
$objeto2 = unserialize($cadena);
```

#### ✅ Conceptos clave:

- `class Clase { public $prop; function metodo() {...} }`
- `$obj = new Clase();`
- `$this->propiedad`
- Herencia: `class Hija extends Padre`
- Métodos estáticos: `static function`, `self::`
- Serialización:

  - `serialize($objeto)` → convierte objeto a string
  - `unserialize($string)` → revierte a objeto

---
