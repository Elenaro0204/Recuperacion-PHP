<?php

require_once 'TiendaDB.php';

class Usuario
{
    private $id;
    private $nombre;
    private $pass;
    private $rol;

    function __construct($id = 0, $nombre = "", $pass = "", $rol = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->pass = $pass;
        $this->rol = $rol;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    // Insertar nuevo usuario
    public function insert()
    {
        $conexion = TiendaDB::connectDB();
        $insercion = "INSERT INTO usuario (nombre, pass, rol) VALUES (:nombre, :pass, :rol)";
        $stmt = $conexion->prepare($insercion);
        $stmt->execute([
            ':nombre' => $this->nombre,
            ':pass' => $this->pass,
            ':rol' => $this->rol
        ]);
        $conexion = null;
    }

    // Eliminar usuario por ID
    public function delete()
    {
        $conexion = TiendaDB::connectDB();
        $borrado = "DELETE FROM usuario WHERE id = :id";
        $stmt = $conexion->prepare($borrado);
        $stmt->execute([':id' => $this->id]);
        $conexion = null;
    }

    // Actualizar datos del usuario
    public function update()
    {
        $conexion = TiendaDB::connectDB();
        $actualizacion = "UPDATE usuario 
                      SET nombre = :nombre, pass = :pass, rol = :rol 
                      WHERE id = :id";
        $stmt = $conexion->prepare($actualizacion);
        $stmt->execute([
            ':nombre' => $this->nombre,
            ':pass' => md5($this->pass),
            ':rol' => $this->rol,
            ':id' => $this->id
        ]);
        $conexion = null;
    }

    // Obtener usuario por ID
    public static function getUsuarioById($id)
    {
        $conexion = TiendaDB::connectDB();
        $consulta = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $conexion->prepare($consulta);
        $stmt->execute([':id' => $id]);

        if ($stmt->rowCount() > 0) {
            $registro = $stmt->fetchObject();
            return new Usuario($registro->id, $registro->nombre, $registro->pass, $registro->rol);
        } else {
            return false;
        }
    }

    // Login (devolviendo objeto Usuario si existe)
    public static function login($nombre, $pass)
    {
        $conexion = TiendaDB::connectDB();
        $consulta = $conexion->prepare("SELECT * FROM usuario WHERE nombre = :nombre");
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();

        if ($consulta->rowCount() === 1) {
            $fila = $consulta->fetch(PDO::FETCH_ASSOC);

            if ($pass === $fila['pass']) {
                return new Usuario($fila['id'], $fila['nombre'], $fila['pass'], $fila['rol']);
            }
        }

        return false;
    }

    public static function exists($nombre)
    {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT id FROM usuario WHERE nombre = :nombre";
        $stmt = $conexion->prepare($seleccion);
        $stmt->execute([':nombre' => $nombre]);
        return $stmt->rowCount() > 0;
    }
}
