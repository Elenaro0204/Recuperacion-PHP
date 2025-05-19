<?php
class Lagarto extends Animal
{
    public function tomarSol()
    {
        return "$this->nombre está tomando el sol 🦎";
    }

    public function cambiarColor()
    {
        return "$this->nombre ha cambiado de color.";
    }

    public function emitirSonido()
    {
        return "$this->nombre emite un siseo.";
    }
}
