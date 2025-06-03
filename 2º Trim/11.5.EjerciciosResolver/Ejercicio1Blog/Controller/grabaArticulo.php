<?php
require_once '../Model/Articulo.php';

// sube la imagen al servidor
// move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/images/" . $_FILES["imagen"]["name"]);

// inserta la articulo en la base de datos
$fechaHoraActual = date("Y-m-d H:i:s");
$articuloAux = new Articulo("", $_REQUEST['titulo'], $fechaHoraActual, $_REQUEST['contenido']);
$articuloAux->insert();
header("Location: ../Controller/index.php");
