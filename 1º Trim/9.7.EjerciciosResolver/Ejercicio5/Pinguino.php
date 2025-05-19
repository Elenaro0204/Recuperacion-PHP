<?php
  class Pinguino extends Ave {
    public function volar() {
        return "$this->nombre no puede volar. ❌";
    }

    public function nadar() {
        return "$this->nombre nada rápidamente en el agua.";
    }

    public function deslizar() {
        return "$this->nombre se desliza sobre el hielo.";
    }
}  
?>