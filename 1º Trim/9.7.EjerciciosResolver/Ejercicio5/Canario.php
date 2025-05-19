<?php
  class Canario extends Ave {
    public function emitirSonido() {
        return "$this->nombre canta 🎶";
    }

    public function volar() {
        return "$this->nombre vuela entre las ramas.";
    }

    public function saltar() {
        return "$this->nombre está saltando.";
    }
}  
?>