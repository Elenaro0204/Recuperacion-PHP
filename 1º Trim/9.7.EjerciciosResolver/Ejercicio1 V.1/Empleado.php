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

    public function asigna($nombre, $sueldo)
    {
        if ($this->nombre === $nombre) {
            $this->sueldo = $sueldo;
            // ¡¡¡No se ponen echo dentro del objeto!!!
            // echo "<p>Sueldo actualizado correctamente.</p>";
            return true;
        } else {
            // echo "<p>El nombre proporcionado no coincide con el del empleado.</p>";
            return false;
        }
    }

    public function imprimirMensajeImpuestos()
    {
        $salida = "<p>Nombre: <b>" . $this->nombre . "</b></p>";
        $salida .= "<p>Sueldo: <b>" . $this->sueldo . " €</b></p>";

        if ($this->sueldo > 3000) {
            $salida .= "<p>Debe pagar impuestos.</p>";
        } else {
            $salida .= "<p>No debe pagar impuestos.</p>";
        }

        return $salida;
    }
}
