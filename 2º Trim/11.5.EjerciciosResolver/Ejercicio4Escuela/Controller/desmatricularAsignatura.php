<?php
require_once '../Model/AlumnoAsignatura.php';

if (isset($_REQUEST['matricula'], $_REQUEST['codigo_asignatura'])) {
    $matricula = $_REQUEST['matricula'];
    $codigo = $_REQUEST['codigo_asignatura'];

    AlumnoAsignatura::desmatricular($matricula, $codigo);

    header("Location: ../Controller/detallesAlumno.php?matricula=$matricula");
} else {
    die("Parámetros insuficientes.");
}
