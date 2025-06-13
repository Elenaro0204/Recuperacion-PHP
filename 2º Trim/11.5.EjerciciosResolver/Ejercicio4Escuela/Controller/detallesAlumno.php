<?php
require_once '../Model/Alumno.php';
require_once '../Model/Asignatura.php';

if (!isset($_REQUEST['matricula'])) {
    die("No se indicó alumno.");
}

$matricula = $_REQUEST['matricula'];

// Obtener alumno
$alumno = Alumno::getAlumnoByMatricula($matricula);
if (!$alumno) {
    die("Alumno no encontrado.");
}

// Obtener asignaturas en las que está matriculado
$asignaturasMatriculadas = Asignatura::getAsignaturasDeAlumno($matricula);

// Obtener todas las asignaturas disponibles para el desplegable
$todasAsignaturas = Asignatura::getAsignaturas();

// Pasar datos a la vista
$data = [
    'alumno' => $alumno,
    'asignaturasMatriculadas' => $asignaturasMatriculadas,
    'todasAsignaturas' => $todasAsignaturas
];

// Incluir vista, por ejemplo detalleAlumnoView.php
require_once '../View/detalleAlumno_view.php';
