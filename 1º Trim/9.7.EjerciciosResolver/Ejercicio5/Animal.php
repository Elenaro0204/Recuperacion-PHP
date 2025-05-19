<?php

class Animal {
    protected $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function moverse() {
        return "$this->nombre se está moviendo.";
    }

    public function dormir() {
        return "$this->nombre está durmiendo.";
    }

    public function emitirSonido() {
        return "$this->nombre emite un sonido.";
    }
}
