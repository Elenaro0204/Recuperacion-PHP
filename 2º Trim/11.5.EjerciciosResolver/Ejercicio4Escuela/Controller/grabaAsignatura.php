<?php
require_once '../Model/Asignatura.php';

$asignaturaAux = new Asignatura('', $_REQUEST['nombre']);
$asignaturaAux->insert();
header("Location: ../Controller/index.php");
