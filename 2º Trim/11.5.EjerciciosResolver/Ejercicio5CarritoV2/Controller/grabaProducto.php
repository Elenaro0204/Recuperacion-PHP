<?php
require_once '../Model/Producto.php';

// sube la imagen al servidor
// move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/images/" . $_FILES["imagen"]["name"]);

// inserta la producto en la base de datos
$productoAux = new Producto("", $_REQUEST['nombre'], $_REQUEST['precio'], $_REQUEST['stock']);
$productoAux->insert();
header("Location: ../Controller/index.php");
