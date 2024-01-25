<?php
// Cerrar la sesión y redirigir al inicio de sesión
session_start();
session_destroy();
header('Location: login.php');
exit();
?>
