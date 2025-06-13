<?php
  require_once '../Model/Producto.php';
  $productoAux = new Producto($_REQUEST['codigo']);
  $productoAux->delete();
  header("Location: ../Controller/index.php");