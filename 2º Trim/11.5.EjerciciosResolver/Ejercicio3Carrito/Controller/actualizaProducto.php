<?php
  require_once '../Model/Producto.php';
  $data['producto']=Producto::getProductoByCodigo($_REQUEST['codigo']);

  // Carga la vista del formulario de alta de producto
  include '../View/actualizaProducto_view.php';
