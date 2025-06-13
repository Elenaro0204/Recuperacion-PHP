<?php

require_once 'EscuelaDB.php';

class Asignatura
{
    private $codigo;
    private $nombre;

    public function __construct($codigo = null, $nombre = "")
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
    }

    // Getters
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    // Setters
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    // Insertar nueva asignatura
    public function insert()
    {
        $conexion = EscuelaDB::connectDB();
        $insercion = "INSERT INTO asignatura (nombre) VALUES ('$this->nombre')";
        $conexion->exec($insercion);
        $conexion = null;
    }

    // Eliminar asignatura
    public function delete()
    {
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM asignatura WHERE codigo = '$this->codigo'";
        $conexion->exec($borrado);
        $conexion = null;
    }

    public function update()
    {
        $conexion = EscuelaDB::connectDB();
        $actualiza = "UPDATE asignatura 
                SET nombre = '$this->nombre' 
                WHERE codigo = '$this->codigo'";
        $conexion->exec($actualiza);
        $conexion = null;
    }

    // Obtener todas las asignaturas
    public static function getAsignaturas()
    {
        $conexion = EscuelaDB::connectDB();
        $consulta = $conexion->query("SELECT codigo, nombre FROM asignatura ORDER BY nombre");

        $asignaturas = [];

        while ($registro = $consulta->fetchObject()) {
            $asignaturas[] = new Asignatura($registro->codigo, $registro->nombre);
        }

        $conexion = null;
        return $asignaturas;
    }

    // Obtener asignaturas de un alumno
    public static function getAsignaturasDeAlumno($matricula)
    {
        $conexion = EscuelaDB::connectDB();
        $consulta = $conexion->query("SELECT a.codigo, a.nombre 
                                  FROM asignatura a 
                                  JOIN alumno_asignatura aa ON a.codigo = aa.codigo_asignatura 
                                  WHERE aa.matricula = '$matricula' 
                                  ORDER BY a.nombre");

        $asignaturas = [];

        while ($registro = $consulta->fetchObject()) {
            $asignaturas[] = new Asignatura($registro->codigo, $registro->nombre);
        }

        $conexion = null;
        return $asignaturas;
    }

    // Matricular alumno en una asignatura
    public static function matricularAlumno($matricula, $codigo_asignatura)
    {
        $conexion = EscuelaDB::connectDB();
        $consulta = "INSERT INTO alumno_asignatura (matricula, codigo_asignatura) VALUES ('$matricula', '$codigo_asignatura')";
        $conexion->exec($consulta);
        $conexion = null;
    }

    // Desmatricular alumno de una asignatura
    public static function desmatricularAlumno($matricula, $codigo_asignatura)
    {
        $conexion = EscuelaDB::connectDB();
        $consulta = "DELETE FROM alumno_asignatura WHERE matricula = '$matricula' AND codigo_asignatura = '$codigo_asignatura'";
        $conexion->exec($consulta);
        $conexion = null;
    }

    public static function getAsignaturaByCodigo($codigo)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT codigo, nombre FROM asignatura WHERE codigo = '$codigo'";
        $consulta = $conexion->query($seleccion);

        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            return new Asignatura($registro->codigo, $registro->nombre);
        } else {
            return false;
        }
    }
}
