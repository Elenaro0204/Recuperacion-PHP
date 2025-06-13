<?php
  require_once '../Model/Alumno.php';
  $alumnoAux = new Alumno($_REQUEST['matricula']);
  $alumnoAux->delete();
  header("Location: ../Controller/index_view.php");