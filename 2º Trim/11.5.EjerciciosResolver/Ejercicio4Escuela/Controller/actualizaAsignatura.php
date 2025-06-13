<?php
  require_once '../Model/Asignatura.php';
  $data['asignatura']=Asignatura::getAsignaturaByCodigo($_REQUEST['codigo']);

  // Carga la vista del formulario de alta de asignatura
  include '../View/actualizaAsignatura_view.php';
