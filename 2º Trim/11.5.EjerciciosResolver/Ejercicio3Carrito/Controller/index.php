<?php
 require_once '../Model/Producto.php';

  // Obtiene todas las productos
  $data['productos'] = Producto::getProductos();

  // Carga la vista de listado
  include '../View/index_view.php';