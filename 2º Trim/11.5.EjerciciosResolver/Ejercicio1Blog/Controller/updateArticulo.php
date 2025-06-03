<?php
  require_once '../Model/Articulo.php';

  $articulo=Articulo::getArticuloById($_REQUEST['id']);

  // actualiza la articulo en la base de datos
  $fechaHoraActual = date("d/m/Y H:i:s");
  $articuloAux = new Articulo($_REQUEST['id'], $_REQUEST['titulo'], $fechaHoraActual, $_POST['contenido']);
  $articuloAux->update();
  header("Location: ../Controller/index.php");