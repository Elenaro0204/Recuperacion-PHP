<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'toor');
define('DB_NAME', 'escuela2'); // Cambia si tu BD tiene otro nombre

header('Content-Type: application/json; charset=utf-8');

$metodo = $_SERVER['REQUEST_METHOD'];
$mensaje = "OK";
$codigo = 200;
$respuesta = null;

function conectarBD()
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die(json_encode(['error' => 'Error de conexión']));
    }
    return $conn;
}

$conn = conectarBD();

switch ($metodo) {
    case 'GET':
        if (isset($_GET['curso'])) {
            $curso = $conn->real_escape_string($_GET['curso']);
            $sql = "SELECT * FROM alumno WHERE curso = '$curso'";
            $res = $conn->query($sql);
            $respuesta = $res->fetch_all(MYSQLI_ASSOC);
        } elseif (isset($_GET['nombre'])) {
            $nombre = $conn->real_escape_string($_GET['nombre']);
            $sql = "SELECT * FROM alumno WHERE nombre LIKE '%$nombre%'";
            $res = $conn->query($sql);
            $respuesta = $res->fetch_all(MYSQLI_ASSOC);
        } elseif (isset($_GET['matricula']) && isset($_GET['ver_asignaturas'])) {
            $matricula = $conn->real_escape_string($_GET['matricula']);
            $sql = "SELECT a.codigo, a.nombre FROM asignatura a
                    JOIN alumno_asignatura aa ON a.codigo = aa.codigo_asignatura
                    WHERE aa.matricula = '$matricula'";
            $res = $conn->query($sql);
            $respuesta = $res->fetch_all(MYSQLI_ASSOC);
        } else {
            $codigo = 400;
            $mensaje = "Consulta GET inválida.";
        }
        break;

    case 'POST':
        $datos = json_decode(file_get_contents('php://input'), true);
        if (isset($datos['matricula']) && isset($datos['codigo_asignatura'])) {
            $mat = $conn->real_escape_string($datos['matricula']);
            $cod = intval($datos['codigo_asignatura']);
            $sql = "INSERT INTO alumno_asignatura (matricula, codigo_asignatura) VALUES ('$mat', $cod)";
            if ($conn->query($sql)) {
                $mensaje = "Alumno matriculado correctamente.";
            } else {
                $codigo = 500;
                $mensaje = "Error al matricular. ¿Ya estaba matriculado?";
            }
        } else {
            $codigo = 400;
            $mensaje = "Faltan datos en el POST.";
        }
        break;

    case 'PUT':
        $datos = json_decode(file_get_contents("php://input"), true);
        if (isset($datos['matricula']) && isset($datos['nuevo_curso'])) {
            $matricula = $conn->real_escape_string($datos['matricula']);
            $nuevoCurso = $conn->real_escape_string($datos['nuevo_curso']);
            $sql = "UPDATE alumno SET curso = '$nuevoCurso' WHERE matricula = '$matricula'";
            if ($conn->query($sql)) {
                $mensaje = "Curso actualizado correctamente.";
            } else {
                $codigo = 500;
                $mensaje = "Error al cambiar curso.";
            }
        } else {
            $codigo = 400;
            $mensaje = "Faltan datos para PUT.";
        }
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $datos);
        if (isset($datos['matricula'])) {
            $mat = $conn->real_escape_string($datos['matricula']);
            $conn->query("DELETE FROM alumno_asignatura WHERE matricula = '$mat'");
            $sql = "DELETE FROM alumno WHERE matricula = '$mat'";
            if ($conn->query($sql)) {
                $mensaje = "Alumno eliminado.";
            } else {
                $codigo = 500;
                $mensaje = "Error al eliminar alumno.";
            }
        } else {
            $codigo = 400;
            $mensaje = "Falta matrícula.";
        }
        break;

    default:
        $codigo = 405;
        $mensaje = "Método no permitido.";
}

$conn->close();

http_response_code($codigo);
echo json_encode([
    'codigo' => $codigo,
    'mensaje' => $mensaje,
    'datos' => $respuesta
]);
