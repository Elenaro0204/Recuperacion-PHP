# Apuntes 1º Trimestre

## Tema 3

### Variables

Los nombres de las variables comienzan con el símbolo dólar ($) y no es necesario
definirlas. La misma variable puede contener distintos tipos de dato.

- La función _var_dump(vble1, vble2, ...)_ imprime el tipo y valor de cada variable o array pasado
  por parámetro.
- La función _print_r(vble)_ imprime sólo el valor de una variable o array pasado por parámetro.
- La función _isset(vble)_ devuelve verdadero si la vble tiene definido algún valor.

### Constantes

Definir las constantes en mayúsculas y sin el símbolo ‘$’: define("PI", 3.14); -> echo "<p>El valor de pi es PI</p>\n";
Algunas constantes predefinidas:

- M_PI: valor de PI
- PHP_INT_MAX:valor máximo de un entero
- PHP_INT_MIN:valor mínimo de un entero

**Operadores aritméticos**

- Suma `+`
- Resta `-`
- Multiplicación `*`
- División `/`
- Módulo `%`
- Incremento `++`
- Decremento `--`

Si ++ o -- se pone delante de la variable en una expresión se ejecuta antes de resolverla.

- rand(mínimo, máximo) genera un aleatorio entero entre dos valores.
- round(valor, nºdecimales) redondea el valor con el número de decimales indicado
- floor(numero con decimales) devuelve la parte entera sin decimales redondeando
- ceil(numero con decimales) devuelve la parte entera redondeando hacia arriba siempre
- intval(numero con decimales) devuelve la parte entera ignorando los decimales (truncar)

**Operadores para String**
`.` concatena dos Strings
`.=` añade al final del String de la izquierda, el String de la derecha
`“”` delimitan un String y amplian el valor de variables primitivas en su interior
`‘’` delimitan un String y NO amplian el valor de variables primitivas en su interior
`\` hacen escapar el comportamiento de caracteres especiales dentro de un string
Se pueden combinar comillas dobles dentro de simples y viceversa.

### Recogida de datos de formularios (si no se define method, por defecto se usa GET):

`$_GET[‘nombre’]` : (array asociativo para método get y parámetros por url)

```php
<a href="destino.php?variable1=valor1&variable2=valor2&...">Mi enlace</a>
```

`$_POST[‘nombre’]` : (array asociativo para método post. OBLIGATORIO con sesiones)
`$_REQUEST[‘nombre’]` : (array asociativo para métodos get, post y cookies)
`enctype =  "multipart/form-data"` : en un formulario indica que se envia texto y ficheros (es
obligatorio usar metodo post)
`<input type=””>`: usar los tipos adecuados (number, color, date, email, url ...), para restringir los
tipos de datos enviados a la página destino.

**Envio de datos por URL, en vez de usar formularios**

```php
<a href="destino.php?variable1=valor1&variable2=valor2&...">Mi enlace</a>
```

#### Redireccionamiento automático a otra página:

`header(‘location:paginadestino.php’);`

#### Redireccionamiento a la última página visitada antes de la actual

`header(‘location:’.getenv(‘HTTP_REFERER’));`

> Si al volver atrás con el navegador a una página con formularios nos salta error de que la página ha caducado podemos solucionar el error evitando que el navegador almacene en caché la respuesta, añadiendo estas líneas al principio:

```php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
```

---

## Tema 4

### Operadores de comparación

- `==` Igual (a == $b -> $a es igual $b): aunque sean de diferente tipo
- `===` Igual ($a === $b -> $a es igual $b) (y además son del mismo tipo)
- `!=` Distinto ($a != $b -> $a es distinto $b)
- `<` Menor que ($a < $b -> $a es menor que $b)
- `>` Mayor que ($a > $b -> $a es mayor que $b)
- `<=` Menor o igual ($a <= $b -> $a es menor o igual que $b)
- `>=` Mayor o igual ($a >= $b -> $a es mayor o igual que $b)
- `<=>` Nave espacial ($a <=> $b -> -1 si $a es menor, 0 si son iguales y 1 si $b es menor)

### Operadores lógicos

- Y -> `&&`, and
- O -> `||`, or
- Negación -> `!`

- IF Opción 1

```php
if (condición) {
sentencias a ejecutar cuando la condición es cierta }
else {
Sentecias a ejecutar cuando la condición es falsa }
```

- IF Opción 2 (formato resumido)

```php
(condición) ? expresión1 : expresión2
```

- IF Opción 3

```php
<?php if (condition): ?>
Código html a mostrar si la condición es true
<?php else: ?>
Código html a mostrar si la condición es false
<?php endif ?>
```

- SWITCH Opción 1

```php
switch(variable) {
case valor1:
sentencias
break;
case valor2:
sentencias
break;
. . .
default:
sentencias
}
```

- SWITCH Opción 2 (para evaluar expresiones booleanas en vez de un valor)

```php
switch(true) {
case ExpresionBooleana1:
sentencias
break;
case ExpresionBooleana2:
break;
. . .
default:
sentencias
}
```

- BUCLE for

```php
for (expresion1 ; expresion2 ; expresion3) {
sentencias
}
```

- BUCLE foreach (para arrays normales)

```php
foreach ($array as $elemento) {
echo $elemento;
}
```

- BUCLE foreach (para arrays asociativos)

```php
foreach ($array as $indice=>$valor) {
echo $elemento;
}
```

- BUCLE while

```php
while (expresion) {
sentencias
}
```

- BUCLE do-while

```php
do {
sentencias
} while (expresion)
```

---

## Tema 5

### Tipos de arrays

#### Arrays clásicos de tamaño variable

```php
$v[0] = 16; $v[1] = 15; $v[2] = 17; $v[3] = 15; $v[4] = 16;
$v = array(16, 15, 17, 15, 16);
$color = ["verde", "amarillo", "rojo", "azul", "blanco", "gris"];
$v[]=14; Añade el valor en la última posición
echo $v[4]; acceso al valor del índice 4 del array
$v[]="nuevo valor"; //añade un valor al final del array
```

Como paso un array como parámetro a otra página.
Solo se puede pasar texto, así que hay que convertir el array en una cadena antes de enviarlo y obtener el array a partir de la cadena en la página de destino.

- Opción 1:
  `$v = explode("caracter", $texto);` separa el texto por cada ‘carácter’ encontrado y lo almacena en el array
  `$texto = implode ("caracter", $v);` une los elementos del array en una cadena, con el ‘carácter’
  indicado entre los elementos del array
- Opción 2:
  `$cadena= serialize($array);` `$cadena` almacena el array como texto (para usar en BD o sesiones)
  `$array= unserialize($cadena);` se recupera el array u objeto original serializado en `$cadena`
  Nota: con arrays asociativos la serialización se corrompe al ser enviada, así que hay que usar la
  función en combinación con otra de la siguiente forma:

```php
$cadena=base64_encode(serialize($array));
$array=unserialize(base64_decode($cadena));
```

#### Arrays clásicos de tamaño fijo:

`$v = new SplFixedArray(10);` (los valores no inicializados son null)

#### Arrays asociativos:

```php
$edades['Rosa']=16; $edades['Ignacio']=25; $edades['Daniel']=17; $edades['Rubén']=18;
$edades = array("Rosa" => 16, "Ignacio" => 25, "Daniel" => 17, "Rubén" => 18);
$edades = ["Rosa" => 16, "Ignacio" => 25, "Daniel" => 17, "Rubén" => 18];
echo "Daniel:  ", $edades['Daniel'];
```

Paso en un formulario de varios valores como un array
En el formulario:

```html
<input type="”text”" name="”nombreArray[índice1]”" />
<input type="”text”" name="”nombreArray[índice2]”" />
```

En página de destino.

```php
$nombreArray=$_GET[‘nombreArray’];
```

#### Arrays bidimensionales:

```php
$v = array(array(5, 6, 2), array(4, 7, 1, 6, 3), array(5, 9));
$v = [[5, 6, 2], [4, 7, 1, 6, 3], [5, 9]];
$persona = array (
array( "nombre" =>"Rosa", "estatura" => 168, "sexo" =>"F"),
array( "nombre" =>"Ignacio", "estatura" => 175, "sexo" =>"M"),
array( "nombre" =>"Daniel", "estatura" => 172, "sexo" =>"M"),
array( "nombre" =>"Rubén", "estatura" => 182, "sexo" =>"M")
);
$persona = [['ana'=>'pepe', 'julia'=>'juan'],
['luisa'=>'adrian'],
['eva'=>'wally', 'sandra'=>'antonio','maria'=>'jose']];
$persona = ['ancianos'=> ['ana'=>'pepe', 'julia'=>'juan'], 'mayores'=> ['luisa'=>'adrian'],
'jovenes'=> ['eva'=>'wally', 'sandra'=>'antonio','maria'=>'jose']];
```

### Funciones principales de Arrays:

- `count($array)`: devuelve la dimensión de un array
- `array_key_last($array)`: devuelve el índice del último elemento añadido al array asociativo o clásico
- `in_array($buscado, $array)`: devuelve booleano si el elemento buscado está en array
- `array_key_exists($buscado,$array)`: devuelve booleano si elemento buscado en índices del array asociativo
- `array_search($buscado, $array)`: devuelve el índice (si es asociativo será una cadena) del elemento buscado en array, si no está devuelve falso.
- `array_rand($array, $num)`: devuelve un array de tantos elementos como indique `$num`, con valores aleatorios elegidos de entre las claves/índices de `$array` (sea asociativo o no)
- `array_fill(índice_comienzo, número_elementos, valor)`: crea e inicializa un array, comenzando en índice_comienzo, con número_elementos y con el valor indicado en todas las posiciones.
- `array_slice($array, posición_inicio, número_elementos)`: devuelve del array, solo con los elementos indicados: desde la posición de inicio (si es negativo se cuenta desde el final hacia atrás) y la cantidad indicada en número de elementos (si no se indica, se coge hasta el último).

### Formas de recorrer un array

#### Recorrido arrays con foreach

```php
//para arrays normales
foreach ($array as $elemento) {
echo $elemento;

}
//para arrays asociativos
foreach ($array as $indice=>$valor) {
echo $valor;
}
```

#### Recorrido array bidimensional clásico

```php
for($i=0; $i<count($m); $i++){
for ($j=0; $j<count($m[$i]); $j++){
echo $m[$i][$j],' - ';
}
echo '<br>';
}
```

#### Recorrido array bidimensional asociativo (en 1 dimensión)

##### Asociativo en la 1ª dimensión

```php
foreach ($alumno as $nombre=>$notas){
$suma=0;
for ($i=0; $i<count($notas); $i++){
$suma+=$notas[$i];
}
$media=$suma/count($notas);
echo “Alumno: $nombre – Nota media: $media <br>”;
}
```

##### Asociativo en la 2ª dimensión

```php
for ($i=0; $i<count($persona); $i++){
foreach ($persona[$i] as $m=>$h){
echo $m, '  casada con  ',$h,' ; ';
}
echo '<br>';
}
```

##### Recorrido array bidimensional asociativo (en las 2 dimensiones)

```php
foreach($persona as $ciudad=>$filaPersonas){
echo “Parejas de la ciudad $ciudad ”;
foreach ($filaPersonas as $m=>$h){
echo $m, '  casada con  ',$h,' ; ';
}

echo '<br>';
}
```
