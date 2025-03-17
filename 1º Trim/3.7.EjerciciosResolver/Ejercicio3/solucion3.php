<?php 
$color=$_REQUEST['colorFondo'];
$letra=$_REQUEST['tipoLetra'];
$alineacion=$_REQUEST['alineacionTexto'];
$imagen=$_REQUEST['banner'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solucion Ejercicio 3</title>
    <style>
        body {
            margin: 0 auto;
            padding: 0;
        }
        div {
            background-color:<?=$color?>;
            text-align:<?=$alineacion?>;
            font-family:<?=$letra?>;

            margin: 0 auto;
        }
        img {
            width: 100%;
            height: 60px;

            display: block;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div>
        <img src="<?=$imagen?>" alt="<?= $imagen?>">
        <p>Texto de prueba</p>
    </div>
    <a href="Ejercicio3.php">Volver al formulario</a>  <!-- Link para volver al formulario -->
    
</body>
</html>