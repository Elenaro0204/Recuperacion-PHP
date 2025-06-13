<?php

require_once 'TiendaDB.php';

class Producto
{
  private $codigo;
  private $nombre;
  private $precio;
  private $stock;

  function __construct($codigo = 0, $nombre = "", $precio = 0.0, $stock = 0)
  {
    $this->codigo = $codigo;
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->stock = $stock;
  }

  public function getCodigo()
  {
    return $this->codigo;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function getPrecio()
  {
    return $this->precio;
  }

  public function getStock()
  {
    return $this->stock;
  }

  public function setStock($stock)
  {
    $this->stock = $stock;
  }

  public function insert()
  {
    $conexion = BlogDB::connectDB();
    $insercion = "INSERT INTO producto (nombre, precio, stock) VALUES ('$this->nombre', $this->precio, $this->stock)";
    $conexion->exec($insercion);
    $conexion = null;
  }

  public function delete()
  {
    $conexion = BlogDB::connectDB();
    $borrado = "DELETE FROM producto WHERE codigo = $this->codigo";
    $conexion->exec($borrado);
    $conexion = null;
  }

  public function update()
  {
    $conexion = BlogDB::connectDB();
    $actualiza = "UPDATE producto SET nombre = '$this->nombre', precio = $this->precio, stock = $this->stock WHERE codigo = $this->codigo";
    $conexion->exec($actualiza);
    $conexion = null;
  }

  public static function getProductos()
  {
    $conexion = BlogDB::connectDB();
    $seleccion = "SELECT codigo, nombre, precio, stock FROM producto ORDER BY nombre ASC";
    $consulta = $conexion->query($seleccion);

    $productos = [];

    while ($registro = $consulta->fetchObject()) {
      $productos[] = new Producto($registro->codigo, $registro->nombre, $registro->precio, $registro->stock);
    }

    $conexion = null;
    return $productos;
  }

  public static function getProductoByCodigo($codigo)
  {
    $conexion = BlogDB::connectDB();
    $seleccion = "SELECT codigo, nombre, precio, stock FROM producto WHERE codigo = $codigo";
    $consulta = $conexion->query($seleccion);
    if ($consulta->rowCount() > 0) {
      $registro = $consulta->fetchObject();
      $producto = new Producto($registro->codigo, $registro->nombre, $registro->precio, $registro->stock);
      return $producto;
    } else {
      return false;
    }
  }
}
