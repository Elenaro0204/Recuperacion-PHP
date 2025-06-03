<?php 
// Incluyo la clase Viaje
include_once "Viaje.php";

// Defino la constante del fichero
$fichero = "viajes.txt";

// Inicio la session
if (session_status() == PHP_SESSION_NONE) session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Elena Rengel Olivares</title>
</head>
<body>
    <h1>Introduzca la contraseña de administración</h1>

    <!-- Formulario para introducir la contraseña -->
    <form method="POST" action="">
        <label for="pass">Contraseña:</label><br>
        <input type="password" name="pass" placeholder="Introduce la contraseña" required><br>

        <input type="submit" name="comprobar" value="Aceptar">
    </form>
    
    <?php 
    if (isset($_REQUEST['pass']) && isset($_REQUEST['comprobar'])){
        $pass = $_REQUEST['pass'];
        $contrasena = "travelling";

        if ($pass != $contrasena) {
            ?>
             <h2 style="color: red;">Contraseña de administración incorrecta</h2> 
            <?php
        }else{
            header("Location: add.php");
        }
    };
    ?>
</body>
</html>