<?php 

class Viaje
{
    public $destino;
    public $precio;
    public $fecha; // Se almacena como entero

    public static $totalVentas = 0; // Atributo estatico

    // Constructor
    public function __construct($destino = "anonimo", $precio, $fecha)
    {
        $this->destino = ($destino == null) ? "anonimo" : $destino;
        $this->precio = ($precio == null) ? 0 : $precio;
        $this->fecha = $fecha;

        // Actualiza el contador para ver el total
        Viaje::$totalVentas++;
    }

    // Getters
    public function getDestino()
    {
        return $this->destino;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getFecha() {
        return $this->fecha;
    }

    //Metodo estatico
    public static function getTotalVentas() {
        return Viaje::$totalVentas;
    }

    // Setters
    public function setDestino($nuevoDestino)
    {
        $this->destino = $nuevoDestino;
    }

    public function setPrecio($nuevoPrecio)
    {
        $this->precio = $nuevoPrecio;
    }

    public function setFecha($nuevaFecha)
    {
        $this->fecha = date('d-m-Y', strtotime($nuevaFecha));
    }

    // Metodo Inminente
    public function inminente($destino, $fecha)
    {
        $fechaInminente = date("d-m-Y", strtotime("$fecha + 3 month"));
        if ($this->fecha <= $fechaInminente) {
            return true;
        } else {
            return false;
        }
    }

    // Metodo retrasar 1 mes
    public static function restrasarMes($fecha)
    {
        return date("d-m-Y", strtotime("$fecha + 1 month"));
    }
}
?>