<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    // Conexión a la base de datos  
    try {
        $conexion = new PDO(
            "mysql:host=localhost;dbname=banco;charset=utf8",
            "root",
            "toor"
        );
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    // Comprueba si ya existe un cliente con el DNI introducido 
    $consulta = $conexion->query("SELECT dni FROM cliente WHERE dni='" . $_POST['dni'] . "'");

    if ($consulta->rowCount() > 0) {
    ?>
        Ya existe un cliente con DNI <?= $_POST['dni'] ?><br>
        Por favor, vuelva a la <a href="OperacionesTablaBBDD.php">página de alta de
            cliente</a>.
    <?php
    } else {
        $insercion = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES ('$_POST[dni]','$_POST[nombre]','$_POST[direccion]','$_POST[telefono]')";
        //echo $insercion; 
        try {
            $conexion->exec($insercion);
            echo "Cliente dado de alta correctamente.";
        } catch (PDOException $e) {
            echo "Error al insertar cliente: " . $e->getMessage();
        }

        $conexion = null;
    }
    ?>

    <br>
    <a href="EjemploListadoCompletoBBDD.php">Volver al Inicio</a>
</body>

</html>