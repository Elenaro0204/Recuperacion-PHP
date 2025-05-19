<?php

class Empleado
{
    private $nombre;
    private $sueldo;

    // Formato clasico
    // public function __construct($nombre, $sueldo) {
    //     $this->nombre = $nombre;
    //     $this->sueldo = $sueldo;
    // }

    // Formato para evitar que salten errores
    public function __construct($nombre = "anonimo", $sueldo)
    {
        $this->nombre = ($nombre == null) ? "anonimo" : $nombre;
        $this->sueldo = ($sueldo == null) ? 0 : $sueldo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nuevoNombre)
    {
        $this->nombre = $nuevoNombre;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function setSueldo($nuevoSueldo)
    {
        $this->sueldo = $nuevoSueldo;
    }

    public function asigna($nombre, $sueldo)
    {
        if ($this->nombre === $nombre) {
            $this->sueldo = $sueldo;
            return true;
        } else {
            return false;
        }
    }

    public function imprimirMensajeImpuestos()
    {
        $salida = "";

        if ($this->sueldo > 3000) {
            $salida .= "Debe pagar impuestos.";
        } else {
            $salida .= "No debe pagar impuestos.";
        }

        return $salida;
    }

    public static function subirSueldo($sueldo)
    {
        return $sueldo + 100;
    }
}
