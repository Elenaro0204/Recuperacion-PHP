<?php
if (session_status() == PHP_SESSION_NONE) session_start();
session_unset();
session_destroy();
setcookie("usuario", "", time() - 3600);
setcookie("contrasena", "", time() - 3600);
header("Location: login.php");
?>
