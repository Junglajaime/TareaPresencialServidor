<?php
session_start();

// Obtener la opción seleccionada desde el parámetro en la URL
$opcion_seleccionada = isset($_GET['opcion']) ? $_GET['opcion'] : '';

// Almacenar la opción seleccionada en la sesión
$_SESSION['ultima_opcion'] = $opcion_seleccionada;

// Redirigir al usuario a la página correspondiente
header('Location: ../users/admin.php');
exit();
?>
