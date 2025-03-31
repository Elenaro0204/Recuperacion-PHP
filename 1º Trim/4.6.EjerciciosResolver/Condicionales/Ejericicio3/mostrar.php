<?php
// Obtener el índice del mosaico desde la URL
$tile = isset($_GET['tile']) ? (int)$_GET['tile'] : 0;

// Verificar si el índice está en el rango correcto
if ($tile < 0 || $tile > 8) {
    header("Location: Ejercicio3.php");
    exit;
}

// Aquí podrías tener un array con los nombres de las imágenes de cada mosaico
$mosaicos = [
    "./tiles/tile0.jpg",
    "./tiles/tile1.jpg",
    "./tiles/tile2.jpg",
    "./tiles/tile3.jpg",
    "./tiles/tile4.jpg",
    "./tiles/tile5.jpg",
    "./tiles/tile6.jpg",
    "./tiles/tile7.jpg",
    "./tiles/tile8.jpg",
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url=Ejercicio3.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-gap: 5px;
        }

        .cuadro {
            width: 100px;
            height: 100px;
            background-color: #ccc;
            position: relative;
            overflow: hidden;
        }

        .cuadro img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            /* Ocultar imagen por defecto */
        }

        .mostrar img {
            display: block;
            /* Mostrar la imagen del mosaico seleccionado */
        }
    </style>
</head>

<body>
    <div class="grid">
        <?php for ($i = 0; $i < 9; $i++): ?>
            <div class="cuadro <?php echo $tile == $i ? 'mostrar' : ''; ?>">
                <?php if ($tile == $i) echo "<img src='{$mosaicos[$i]}' alt='Parte de la imagen'>"; ?>
            </div>
        <?php endfor; ?>
    </div>
</body>

</html>