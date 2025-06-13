<?php
 require_once '../Model/Alumno.php';

  // Obtiene todas las alumnos
  $data['alumnos'] = Alumno::getAlumnos();

  // Carga la vista de listado
  include '../View/index_view.php';