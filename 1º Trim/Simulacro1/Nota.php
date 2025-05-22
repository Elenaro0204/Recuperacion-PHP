<?php
class Nota {
    public $titulo;
    public $texto;
    public $creacion; // timestamp entero

    public static $ultima = '';
    public static $fecha = 0;

    public function __construct($titulo, $texto) {
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->creacion = time();

        // Actualiza la última nota creada
        self::$ultima = $titulo;
        self::$fecha = $this->creacion;
    }

    public function getFechaFormateada() {
        return date('d/m/Y H:i:s', $this->creacion);
    }
}
?>
