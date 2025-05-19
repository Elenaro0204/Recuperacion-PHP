<?php
// Iniciar sesión
if (session_status() == PHP_SESSION_NONE) session_start();

// Comprobar si se ha hecho clic en una celda para cambiar el fondo
if (isset($_GET['color'])) {
    $_SESSION['background'] = $_GET['color'];
}

// Obtener los colores de la paleta
$colores = isset($_SESSION['paleta']) ? $_SESSION['paleta'] : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Paleta de colores</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            width: 80px;
            height: 80px;
            cursor: pointer;
            border: 1px solid black;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>
<body style="background-color: <?php echo isset($_SESSION['background']) ? $_SESSION['background'] : '#FFFFFF'; ?>;">
    <h1>Paleta creada</h1>

    <table>
        <tr>
        <?php
        $contador = 0;
        foreach ($colores as $color) {
            echo "<td onclick=\"window.location.href='Ejercicio1Paleta.php?color=$color'\" style='background-color: $color'></td>";
            $contador++;
            if ($contador % 5 == 0) echo "</tr><tr>";
        }
        ?>
        </tr>
    </table>

    <form action="Ejercicio1.php" method="post">
        <input type="submit" value="Volver a añadir colores">
    </form>

    <form action="Ejercicio1.php" method="post">
        <input type="submit" name="destroySession" value="Destruir sesión y generar nueva paleta">
    </form>
</body>
</html>
