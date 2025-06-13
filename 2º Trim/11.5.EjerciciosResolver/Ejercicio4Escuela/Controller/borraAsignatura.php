<?php
  require_once '../Model/Asignatura.php';
  $asignaturaAux = new Asignatura($_REQUEST['codigo']);
  $asignaturaAux->delete();
  header("Location: ../Controller/indexAsignatura_view.php");