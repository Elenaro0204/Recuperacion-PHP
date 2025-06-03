<?php

require_once 'BlogDB.php';

class Articulo
{
  private $id;
  private $titulo;
  private $fecha;
  private $contenido;

  function __construct($id = 0, $titulo = "", $fecha = "", $contenido = "")
  {
    $this->id = $id;
    $this->titulo = $titulo;
    $this->fecha = $fecha;
    $this->contenido = $contenido;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getTitulo()
  {
    return $this->titulo;
  }

  public function getFecha()
  {
    return date("d/m/Y - H:i", strtotime($this->fecha));
  }

  public function getContenido()
  {
    return $this->contenido;
  }

  public function insert()
  {
    $conexion = BlogDB::connectDB();
    $insercion = "INSERT INTO articulo (titulo, fecha, contenido) VALUES ('$this->titulo', now(),'$this->contenido')";
    $conexion->exec($insercion);
    $conexion = null;
  }

  public function delete()
  {
    $conexion = BlogDB::connectDB();
    $borrado = "DELETE FROM articulo WHERE id='$this->id'";
    $conexion->exec($borrado);
    $conexion = null;
  }

  public function update()
  {
    $conexion = BlogDB::connectDB();
    $actualiza = "UPDATE articulo SET titulo='$this->titulo', fecha=now(), 
        contenido='$this->contenido' 
        WHERE id='$this->id'";
    $conexion->exec($actualiza);
    $conexion = null;
  }

  public static function getArticulos()
  {
    $conexion = BlogDB::connectDB();
    $seleccion = "SELECT id, titulo, fecha, contenido FROM articulo ORDER BY fecha DESC";
    $consulta = $conexion->query($seleccion);

    $articulos = [];

    while ($registro = $consulta->fetchObject()) {
      $articulos[] = new Articulo($registro->id, $registro->titulo, $registro->fecha, $registro->contenido);
    }

    $conexion = null;
    return $articulos;
  }

  public static function getArticuloById($id)
  {
    $conexion = BlogDB::connectDB();
    $seleccion = "SELECT id, titulo, fecha, contenido FROM articulo WHERE id=$id";
    $consulta = $conexion->query($seleccion);
    if ($consulta->rowCount() > 0) {
      $registro = $consulta->fetchObject();
      $articulo = new Articulo($registro->id, $registro->titulo, $registro->fecha, $registro->contenido);
      return $articulo;
    } else {
      return false;
    }
  }
}
