<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'toor');
define('DB_NAME', 'tienda3');

header('Content-Type: application/json; charset=utf-8');

$metodo = $_SERVER['REQUEST_METHOD'];
$codigo = 200;
$mensaje = "OK";
$respuesta = null;

function setCabecera($codigo, $mensaje) {
    header("HTTP/1.1 $codigo $mensaje");
    header("Content-Type: application/json; charset=utf-8");
}

function conectarBD() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    return $conn;
}

function validarToken($conn, $token) {
    $token = $conn->real_escape_string($token);
    $sql = "SELECT * FROM usuario WHERE token = '$token'";
    $res = $conn->query($sql);

    if ($res && $res->num_rows === 1) {
        $conn->query("UPDATE usuario SET peticiones = peticiones + 1 WHERE token = '$token'");
        return true;
    }
    return false;
}

if ($metodo === 'GET') {
    if (!isset($_GET['token'])) {
        $codigo = 401;
        $mensaje = "Falta el parámetro 'token'.";
    } else {
        $token = $_GET['token'];
        $conn = conectarBD();

        if (!validarToken($conn, $token)) {
            $codigo = 403;
            $mensaje = "Token inválido.";
        } else {
            if (isset($_GET['nombre'])) {
                $nombre = $conn->real_escape_string($_GET['nombre']);
                $sql = "SELECT nombre, precio, CONCAT('img/', LOWER(nombre), '.jpg') AS url_imagen FROM producto WHERE nombre LIKE '%$nombre%'";
            } elseif (isset($_GET['precio_min']) && isset($_GET['precio_max'])) {
                $min = floatval($_GET['precio_min']);
                $max = floatval($_GET['precio_max']);
                $sql = "SELECT nombre, precio, CONCAT('img/', LOWER(nombre), '.jpg') AS url_imagen FROM producto WHERE precio BETWEEN $min AND $max";
            } else {
                $codigo = 400;
                $mensaje = "Faltan parámetros. Usa 'nombre' o 'precio_min' y 'precio_max'.";
            }

            if ($codigo === 200) {
                $res = $conn->query($sql);
                $productos = [];

                if ($res && $res->num_rows > 0) {
                    while ($fila = $res->fetch_assoc()) {
                        $productos[] = $fila;
                    }
                    $respuesta = $productos;
                } else {
                    $codigo = 404;
                    $mensaje = "No se encontraron productos.";
                }
            }
        }

        $conn->close();
    }
} else {
    $codigo = 405;
    $mensaje = "Método no permitido. Usa GET.";
}

setCabecera($codigo, $mensaje);
echo json_encode($respuesta ?? ['error' => $mensaje]);
