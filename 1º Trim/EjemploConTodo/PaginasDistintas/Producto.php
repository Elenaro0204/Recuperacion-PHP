<?php
class Producto
{
    public $nombre;
    public $precio;
    public static $tienda = "PHP Shop";

    public function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function mostrar()
    {
        return "$this->nombre - $this->precio €";
    }

    public static function getTienda()
    {
        return self::$tienda;
    }
}
?>
