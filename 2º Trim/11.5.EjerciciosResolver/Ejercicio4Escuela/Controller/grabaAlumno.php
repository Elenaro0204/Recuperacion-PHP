<?php
require_once '../Model/Alumno.php';

// sube la imagen al servidor
// move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/images/" . $_FILES["imagen"]["name"]);

// inserta la alumno en la base de datos
// $fechaHoraActual = date("Y-m-d H:i:s");
$alumnoAux = new Alumno($_REQUEST['matricula'], $_REQUEST['nombre'], $_REQUEST['apellidos'], $_REQUEST['curso']);
$alumnoAux->insert();
header("Location: ../Controller/index.php");
