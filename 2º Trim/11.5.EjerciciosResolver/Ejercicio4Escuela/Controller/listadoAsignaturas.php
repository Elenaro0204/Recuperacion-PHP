<?php
   require_once '../Model/Asignatura.php';

  // Obtiene todas las asignaturas
  $data['asignaturas'] = Asignatura::getAsignaturas();

  // Carga la vista de listado
  include '../View/indexAsignaturas_view.php';  
?>