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
