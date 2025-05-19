<?php
require_once 'Mamifero.php';

class Gato extends Mamifero
{
    public function emitirSonido()
    {
        return "$this->nombre dice: Miau 🐱";
    }

    public function ronronear()
    {
        return "$this->nombre está ronroneando.";
    }

    public function cazar()
    {
        return "$this->nombre está cazando un ratón.";
    }
}
