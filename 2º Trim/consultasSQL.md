# Guía Completa de Consultas SQL para Aplicaciones MVC

## Índice

1. [Conceptos Básicos](#conceptos-básicos)
2. [Consultas CRUD](#consultas-crud)
3. [Relaciones entre Tablas](#relaciones-entre-tablas)
4. [Consultas Avanzadas](#consultas-avanzadas)
5. [Optimización](#optimización)
6. [Seguridad](#seguridad)
7. [Patrones MVC](#patrones-mvc)
8. [Ejemplos Prácticos](#ejemplos-prácticos)

---

## Conceptos Básicos

### Estructura básica SQL

```sql
SELECT columnas FROM tabla
WHERE condición
GROUP BY columna
HAVING condición_agregación
ORDER BY columna
LIMIT cantidad;
```

### Tipos de datos comunes

- INT: Enteros.
- VARCHAR(n): Texto (n caracteres).
- DATE: Fechas.
- DECIMAL(m,n): Números decimales.
- BOOLEAN: Verdadero/Falso.

### Operadores comunes

- Comparación: =, <>, >, <, >=, <=
- Lógicos: AND, OR, NOT
- Patrones: LIKE, IN, BETWEEN

---

## Consultas CRUD

### CREATE

```sql
-- Crear tabla
CREATE TABLE alumnos (
    matricula VARCHAR(10) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    edad INT
);

-- Insertar datos
INSERT INTO alumnos (matricula, nombre, edad)
VALUES ('A001', 'Juan Pérez', 20);
```

### READ

```sql
-- Selección básica
SELECT * FROM alumnos;

-- Con condiciones
SELECT nombre, edad FROM alumnos WHERE edad > 18;

-- Ordenamiento
SELECT * FROM alumnos ORDER BY nombre ASC;
```

### UPDATE

```sql
-- Actualizar registro
UPDATE alumnos SET edad = 21 WHERE matricula = 'A001';

-- Actualizar múltiples campos
UPDATE alumnos
SET nombre = 'Juan Carlos Pérez', edad = 22
WHERE matricula = 'A001';
```

### DELETE

```sql
-- Eliminar registro
DELETE FROM alumnos WHERE matricula = 'A001';

-- Eliminar todos los registros (¡Cuidado!)
DELETE FROM alumnos;
```

---

## Relaciones entre Tablas

### Tipos de relaciones

1. Uno a Uno: Llave primaria en ambas tablas.
2. Uno a Muchos: Llave foránea en la tabla "muchos".
3. Muchos a Muchos: Tabla intermedia (como alumnoasignatura).

### JOINS

```sql
-- INNER JOIN (solo coincidencias)
SELECT a.nombre, asig.nombre
FROM alumnos a
INNER JOIN alumnoasignatura aa ON a.matricula = aa.matricula
INNER JOIN asignaturas asig ON aa.codigo = asig.codigo;

-- LEFT JOIN (todos los alumnos aunque no tengan asignaturas)
SELECT a.nombre, asig.nombre
FROM alumnos a
LEFT JOIN alumnoasignatura aa ON a.matricula = aa.matricula
LEFT JOIN asignaturas asig ON aa.codigo = asig.codigo;
```

### Subconsultas

```sql
-- En WHERE
SELECT nombre FROM alumnos
WHERE matricula IN (SELECT matricula FROM alumnoasignatura WHERE codigo = 'MAT101');

-- En FROM
SELECT avg_edad FROM (
    SELECT AVG(edad) as avg_edad FROM alumnos
) AS temp;
```

---

## Consultas Avanzadas

### Funciones de Agregación

```sql
SELECT
    COUNT(*) as total_alumnos,
    AVG(edad) as edad_promedio,
    MAX(edad) as edad_maxima,
    MIN(edad) as edad_minima
FROM alumnos;
```

### GROUP BY

```sql
-- Conteo por grupo
SELECT codigo, COUNT(*) as total_alumnos
FROM alumnoasignatura
GROUP BY codigo;

-- HAVING (filtra grupos)
SELECT codigo, COUNT(*) as total
FROM alumnoasignatura
GROUP BY codigo
HAVING COUNT(*) > 5;
```

---

## Filtrado Avanzado en SQL

### Operador LIKE

El operador `LIKE` se usa en cláusulas WHERE para buscar patrones específicos en columnas de texto.

### Sintaxis básica:

```sql
SELECT columnas FROM tabla WHERE columna LIKE patrón;
```

## Comodines

### % (Porcentaje)

- Representa cero, uno o múltiples caracteres.
- Equivalente a \* en búsquedas de archivos.

```sql
-- Nombres que empiezan con 'J'
SELECT * FROM alumnos WHERE nombre LIKE 'J%';

-- Nombres que terminan con 'ez'
SELECT * FROM alumnos WHERE nombre LIKE '%ez';

-- Nombres que contienen 'ana' en cualquier posición
SELECT * FROM alumnos WHERE nombre LIKE '%ana%';
```

### \_ (Guión bajo)

- Representa exactamente un carácter.
- Útil cuando conoces la longitud pero no el carácter exacto.

```sql
-- Nombres de 5 letras que empiezan con 'J' y terminan con 'n'
SELECT * FROM alumnos WHERE nombre LIKE 'J___n';

-- Matrículas con formato A-000 (A, guión, 3 números)
SELECT * FROM alumnos WHERE matricula LIKE 'A-___';
```

#### Ejemplo combinando varios comodines:

```sql
-- Nombres donde la segunda letra es 'a'
SELECT * FROM alumnos WHERE nombre LIKE '_a%';

-- Nombres de 6 caracteres que terminan con 'ez'
SELECT * FROM alumnos WHERE nombre LIKE '____ez';
```

## Patrones Específicos

### Rangos con [ ]

```sql
-- Nombres que empiezan con A, B o C
SELECT * FROM alumnos WHERE nombre LIKE '[ABC]%';

-- Matrículas que empiezan con número entre 1-3
SELECT * FROM alumnos WHERE matricula LIKE '[1-3]%';
```

### Exclusión con [^ ]

- Representa exactamente un carácter.
- Útil cuando conoces la longitud pero no el carácter exacto.

```sql
-- Nombres que NO empiezan con vocal
SELECT * FROM alumnos WHERE nombre LIKE '[^AEIOU]%';
```

### Caracteres especiales

- Para buscar literal (% y \_):

```sql
-- Nombres que contienen exactamente '50%'
SELECT * FROM productos WHERE
```

## Funciones Complementarias

### UPPER/LOWER para búsquedas insensibles

```sql
-- Búsqueda case-insensitive
SELECT * FROM alumnos WHERE UPPER(nombre) LIKE 'J%';
```

### CONCAT para construir patrones

```sql
-- Buscar nombre + apellido combinados
SELECT * FROM alumnos WHERE CONCAT(nombre, ' ', apellido) LIKE '%Pérez%';
```

### TRIM para eliminar espacios

```sql
-- Elimina espacios antes de comparar
SELECT * FROM alumnos WHERE TRIM(nombre) LIKE 'Juan%';
```

## Ejemplos Avanzados en Contexto MVC

### Búsqueda de alumnos en un controlador PHP

```php
public function buscarAlumnos($termino) {
    $conexion = DB::getConnection();
    $termino = $conexion->real_escape_string($termino);
    $sql = "SELECT * FROM alumnos WHERE nombre LIKE '%$termino%' OR apellido LIKE '%$termino%'";
    $resultado = $conexion->query($sql);
    // ... procesar resultados
}
```

### Búsqueda por múltiples criterios

```php
public static function buscarAvanzado($nombre, $matricula, $edad) {
    $sql = "SELECT * FROM alumnos WHERE
            nombre LIKE ? AND
            matricula LIKE ? AND
            edad >= ?";
    // Uso: Alumno::buscarAvanzado('%Juan%', 'A%', 18);
}
```

## Rendimiento con LIKE

### Consideraciones:

- LIKE '%texto' (con wildcard al inicio) no usa índices
- LIKE 'texto%' (con wildcard al final) puede usar índices.

## Ejercicios Prácticos:

### Encontrar todos los alumnos cuyo:

- Apellido empiece con "García" seguido de cualquier cosa.

```sql
SELECT * FROM alumnos WHERE apellido LIKE 'García%';
```

### Buscar asignaturas que:

- Contengan "matem" pero no "aplicadas".

```sql
SELECT * FROM asignaturas
WHERE nombre LIKE '%matem%' AND nombre NOT LIKE '%aplicadas%';
```

### Encontrar matrículas con:

- Formato AA-000 (dos letras, guión, tres números)

```sql
SELECT * FROM alumnos WHERE matricula LIKE '__-___';
```

---

# Alternativas a JOINs para Consultas entre Múltiples Tablas

## 1. Usando Subconsultas

### Ejemplo básico (alumnos con asignaturas):

```sql
-- Alumnos que tienen asignaturas (EXISTS)
SELECT * FROM alumnos a
WHERE EXISTS (
    SELECT 1 FROM alumnoasignatura aa
    WHERE aa.matricula = a.matricula
);

-- Equivalente a:
SELECT a.* FROM alumnos a
INNER JOIN alumnoasignatura aa ON a.matricula = aa.matricula;
```

### Con filtros por patrón:

```sql
-- Alumnos con asignaturas que contengan 'Matem'
SELECT * FROM alumnos
WHERE matricula IN (
    SELECT matricula FROM alumnoasignatura
    WHERE codigo IN (
        SELECT codigo FROM asignaturas
        WHERE nombre LIKE '%Matem%'
    )
);
```

## 2. Usando WHERE con relaciones explícitas

### Ejemplo básico (alumnos con asignaturas):

```sql
-- Alumnos y sus asignaturas (sin JOIN)
SELECT a.nombre AS alumno,
       (SELECT nombre FROM asignaturas WHERE codigo = aa.codigo) AS asignatura
FROM alumnos a, alumnoasignatura aa
WHERE a.matricula = aa.matricula
AND a.nombre LIKE 'A%';
```

## Usando Cláusulas FROM múltiples

```sql
-- No recomendado para tablas grandes
SELECT a.nombre, asig.nombre
FROM alumnos a, alumnoasignatura aa, asignaturas asig
WHERE a.matricula = aa.matricula
AND aa.codigo = asig.codigo
AND asig.nombre LIKE '%Prog%';
```

## Ejemplo:

### Alumnos con asignaturas específicas:

```php
public static function getAlumnosConAsignatura($patronAsignatura) {
    $conexion = EscuelaDB::connectDB();
    $sql = "SELECT * FROM alumnos WHERE matricula IN (
                SELECT matricula FROM alumnoasignatura WHERE codigo IN (
                    SELECT codigo FROM asignaturas WHERE nombre LIKE '%$patronAsignatura%'
                )
            )";
    $resultado = $conexion->query($sql);
    $alumnos = [];
    while ($registro = $resultado->fetchObject()) {
        $alumnos[] = new Alumno($registro->matricula, $registro->nombre);
    }
    return $alumnos;
}
```
