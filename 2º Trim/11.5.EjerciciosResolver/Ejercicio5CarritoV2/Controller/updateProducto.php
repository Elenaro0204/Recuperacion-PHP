<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  require_once '../Model/Producto.php';

  $producto=Producto::getProductoByCodigo($_REQUEST['codigo']);

  // actualiza la producto en la base de datos
  $productoAux = new Producto($_REQUEST['codigo'], $_REQUEST['nombre'], $_REQUEST['precio'], $_REQUEST['stock']);
  $productoAux->update();
  header("Location: ../Controller/index.php");