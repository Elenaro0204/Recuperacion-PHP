# Apuntes 1º Trimestre

## Tema 3
### Variables
Los nombres de las variables comienzan con el símbolo dólar ($) y no es necesario 
definirlas. La misma variable puede contener distintos tipos de dato.  
- La función *var_dump(vble1, vble2, ...)* imprime el tipo y valor de cada variable o array pasado 
por parámetro. 
- La función *print_r(vble)* imprime sólo el valor de una variable o array pasado por parámetro. 
- La función *isset(vble)* devuelve verdadero si la vble tiene definido algún valor.

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