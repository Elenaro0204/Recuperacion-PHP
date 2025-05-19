<?php
  class Perro extends Mamifero {
    public function emitirSonido() {
        return "$this->nombre dice: Guau 🐶";
    }

    public function traerPelota() {
        return "$this->nombre ha traído la pelota.";
    }

    public function moverCola() {
        return "$this->nombre mueve la cola felizmente.";
    }
}  
?>