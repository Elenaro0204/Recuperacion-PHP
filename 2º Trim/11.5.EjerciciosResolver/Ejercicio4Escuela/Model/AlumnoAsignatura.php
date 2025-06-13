<?php
require_once 'EscuelaDB.php';

class AlumnoAsignatura
{
    public static function matricular($matricula, $codigoAsignatura)
    {
        $conexion = EscuelaDB::connectDB();

        $sql = "INSERT INTO alumno_asignatura (matricula, codigo_asignatura)
            VALUES (:matricula, :codigo)";

        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':codigo', $codigoAsignatura);
        $stmt->execute();

        $conexion = null;
    }

    public static function desmatricular($matricula, $codigoAsignatura)
    {
        $conexion = EscuelaDB::connectDB();

        $sql = "DELETE FROM alumno_asignatura WHERE matricula = :matricula AND codigo_asignatura = :codigo";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':codigo', $codigoAsignatura);
        $stmt->execute();

        $conexion = null;
    }
}
