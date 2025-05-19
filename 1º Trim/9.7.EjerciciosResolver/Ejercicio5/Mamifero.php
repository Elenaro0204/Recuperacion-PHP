<?php
require_once 'Animal.php';

class Mamifero extends Animal {
    public function amamantar() {
        return "$this->nombre está amamantando a sus crías.";
    }
}
