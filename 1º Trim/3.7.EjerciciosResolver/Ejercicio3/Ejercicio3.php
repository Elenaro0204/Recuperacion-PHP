<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <h1>Ejercicio 3</h1>
    <p>Mostrar en una página varios parámetros para configurar el aspecto de otra página: color de fondo, tipo de letra,
        alineación del texto, imagen del banner (entre 3 posibles), y demás reglas de estilo que se te ocurran. Una vez
        enviada la información se mostrará una página con el contenido que desees acorde a los estilos elegidos.</p>

    <form action="solucion3.php" method="post">
        <label for="colorFondo">Color de fondo:</label>
        <input type="color" id="colorFondo" name="colorFondo" required>

        <label for="tipoLetra">Tipo de letra:</label>
        <select id="tipoLetra" name="tipoLetra" required>
            <option value="Arial">Arial</option>
            <option value="Verdana">Verdana</option>
            <option value="Helvetica">Helvetica</option>
        </select>

        <label for="alineacionTexto">Alineación del texto:</label>
        <select id="alineacionTexto" name="alineacionTexto" required>
            <option value="left">Izquierda</option>
            <option value="center">Centrado</option>
            <option value="right">Derecha</option>
        </select>
        
        <label for="banner">Selecciona una imagen del banner:</label>
        <!-- <input type="file" id="banner" name="banner" accept="image/*" required> -->
        
        <!-- <select id="banner" name="banner" required>
            <option value="banner1.jpg">Imagen 1</option>
            <option value="banner2.jpg">Imagen 2</option>
            <option value="banner3.jpg">Imagen 3</option>
        </select> -->

        <label>
            <input type="radio" name="banner" value="banner1.jpg" required>
            <img src="banner1.jpg" alt="Imagen 1" width="100" height="100">
        </label>
        <label>
            <input type="radio" name="banner" value="banner2.jpg" required>
            <img src="banner2.jpg" alt="Imagen 2" width="100" height="100">
        </label>
        <label>
            <input type="radio" name="banner" value="banner3.jpg" required>
            <img src="banner3.jpg" alt="Imagen 3" width="100" height="100">
        </label>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>