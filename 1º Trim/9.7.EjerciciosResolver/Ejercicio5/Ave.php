<?php
  class Ave extends Animal {
    public function volar() {
        return "$this->nombre está volando.";
    }

    public function ponerHuevos() {
        return "$this->nombre ha puesto un huevo.";
    }
}  
?>