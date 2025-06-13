<?php
  require_once '../Model/Asignatura.php';

  $asignatura=Asignatura::getAsignaturaByCodigo($_REQUEST['codigo']);

  // actualiza la asignatura en la base de datos
  $asignaturaAux = new Asignatura($_REQUEST['codigo'], $_REQUEST['nombre']);
  $asignaturaAux->update();
  header("Location: ../Controller/listadoAsignaturas.php");