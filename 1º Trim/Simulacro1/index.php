<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once 'Nota.php';

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];

// Inicializar el array de notas si no existe
if (!isset($_SESSION['notas'][$usuario])) {
    $_SESSION['notas'][$usuario] = [];
}

// Crear nueva nota
if (isset($_REQUEST['titulo'], $_REQUEST['texto'])) {
    $titulo = trim($_REQUEST['titulo']);
    $texto = trim($_REQUEST['texto']);
    if ($titulo !== '' && $texto !== '') {
        $nota = new Nota($titulo, $texto);
        $_SESSION['notas'][$usuario][] = serialize($nota);
    }
}

// Mostrar nota seleccionada
$notaSeleccionada = null;
if (isset($_GET['ver'])) {
    $indice = (int) $_GET['ver'];
    if (isset($_SESSION['notas'][$usuario][$indice])) {
        $notaSeleccionada = unserialize($_SESSION['notas'][$usuario][$indice]);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Agenda de Notas</title>
    <style>
        table {
            width: 100%;
        }

        td {
            vertical-align: top;
            padding: 10px;
        }

        .cabecera {
            background-color: #eee;
            padding: 10px;
        }

        .logout {
            float: right;
        }
    </style>
</head>

<body>

    <div class="cabecera">
        <strong>Usuario:</strong> <?= htmlspecialchars($usuario) ?>
        <form method="post" action="logout.php" class="logout">
            <input type="submit" value="Cerrar sesión">
        </form>
        <br>
        <strong>Última nota creada:</strong> <?= Nota::$ultima ?> (<?= date('d/m/Y H:i:s', Nota::$fecha) ?>)
    </div>

    <h2>Crear nueva nota</h2>
    <form method="post">
        Título: <input type="text" name="titulo" required><br>
        Texto: <br>
        <textarea name="texto" rows="5" cols="40" required></textarea><br>
        <input type="submit" value="Guardar nota">
    </form>

    <h2>Mis notas</h2>
    <table border="1">
        <tr>
            <td width="50%">
                <strong>Listado de notas</strong>
                <ul>
                    <?php foreach ($_SESSION['notas'][$usuario] as $i => $notaSerializada):
                        $nota = unserialize($notaSerializada); ?>
                        <li>
                            <a href="?ver=<?= $i ?>"><?= htmlspecialchars($nota->titulo) ?></a> - <?= $nota->getFechaFormateada() ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </td>
            <td width="50%">
                <strong>Contenido de la nota seleccionada</strong><br><br>
                <?php if ($notaSeleccionada): ?>
                    <h3><?= htmlspecialchars($notaSeleccionada->titulo) ?></h3>
                    <p><?= nl2br(htmlspecialchars($notaSeleccionada->texto)) ?></p>
                    <small>Creada el: <?= $notaSeleccionada->getFechaFormateada() ?></small>
                <?php else: ?>
                    <p>Selecciona una nota para ver su contenido.</p>
                <?php endif; ?>
            </td>
        </tr>
    </table>

</body>

</html>