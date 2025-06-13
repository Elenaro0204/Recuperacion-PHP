<?php
  require_once '../Model/Alumno.php';

  $alumno=Alumno::getAlumnoByMatricula($_REQUEST['matricula']);

  // actualiza la alumno en la base de datos
  $alumnoAux = new alumno($_REQUEST['matricula'], $_REQUEST['nombre'], $_REQUEST['apellidos'], $_REQUEST['curso']);
  $alumnoAux->update();
  header("Location: ../Controller/index.php");