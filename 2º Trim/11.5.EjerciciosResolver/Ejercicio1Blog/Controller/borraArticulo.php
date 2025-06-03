<?php
  require_once '../Model/Articulo.php';
  $articuloAux = new Articulo($_REQUEST['id']);
  $articuloAux->delete();
  header("Location: ../Controller/index.php");