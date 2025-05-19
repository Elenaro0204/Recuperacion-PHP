<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['user'])) {
  header('location:Ejercicio4Login.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 4 Sesiones</title>
</head>

<body>
  <h1>Ejercicio 4</h1>
  <p>
    Establece un control de acceso mediante nombre de usuario y contraseña para el ejercicio 1 de esta relación.
    Realiza una nueva versión del ejercicio1, de modo que si lo cargamos sin la sesión iniciada nos redirija a la
    página de login, y en caso contrario muestre el ejercicio normalmente, también debemos incluir un botón
    “cerrar sesión” para cerrar la sesión del usuario y volver a la página de login.
    Al cargar la página de login, si la sesión está iniciada redirige automáticamente a la página del ejercicio1 y si
    no, mostrará el formulario de identificación con usuario y contraseña.
  </p>
  <?php
  if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
    $_SESSION['cuentaNumeros'] = 0;
  }
  if (isset($_REQUEST['n']) &&  $_REQUEST['n'] > 0) {
    $_SESSION['cuentaNumeros']++;
    $_SESSION['total'] +=  $_REQUEST['n'];
  }
  if (isset($_REQUEST['n']) && $_REQUEST['n'] < 0) {
  ?>
    <p>
      La media de los números introducidos es <?php echo $_SESSION['total'] / ($_SESSION['cuentaNumeros']); ?>
    </p>
  <?php
  } else {
  ?>
    <form action="" method="post">
      <input type="hidden" name="ejercicio" value="01">
      <input type="number" name="n" autofocus>
      <input type="submit" value="Aceptar">
    </form>
  <?php
  }
  ?>
  <br>
  <form action="Ejercicio4Login.php" method="post">
    <input type="submit" name="cerrar" value="Cerrar Sesion">
  </form>
</body>

</html>