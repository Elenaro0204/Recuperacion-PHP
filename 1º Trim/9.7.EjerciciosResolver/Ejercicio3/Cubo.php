<?php

class Cubo {
    private $capacidad;
    private $contenido;

    public function __construct($capacidad, $contenidoInicial = 0) {
        $this->capacidad = $capacidad;
        $this->contenido = min($contenidoInicial, $capacidad); // No permite llenar más de lo que cabe
    }

    public function getCapacidad() {
        return $this->capacidad;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function llenar($litros) {
        $this->contenido = min($this->contenido + $litros, $this->capacidad);
    }

    public function vaciar() {
        $this->contenido = 0;
    }

    // Verter contenido de este cubo en otro cubo
    public function verterEn(Cubo $destino) {
        $espacioDisponible = $destino->getCapacidad() - $destino->getContenido();
        $cantidadAVerter = min($this->contenido, $espacioDisponible);

        $this->contenido -= $cantidadAVerter;
        $destino->llenar($cantidadAVerter);
    }

    // Mostrar información del cubo
    public function mostrar() {
        $salida = "Capacidad: " . $this->capacidad. " L, Contenido actual: ".$this->contenido." L<br>";

        return $salida;
    }
}
