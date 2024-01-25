<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $recuerdame = isset($_POST['recuerdame']) ? $_POST['recuerdame'] : "off";
    $mantener = isset($_POST['mantener']) ? $_POST['mantener'] : "off";

    // Verificar las credenciales según el tipo de usuario
    if (($username === 'admin' && $password === 'admin') || ($username === 'user' && $password === 'user')) {
        // Iniciar sesión
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $valid_users[$username]['role'];

        // Redirigir según el perfil
        if ($username === 'admin') {
            header('Location: admin.php');
        } else {
            header('Location: users.php');
        }
        exit();
    } else {
        // Credenciales incorrectas, redirigir a la página de login con un mensaje de error
        header('Location: login.php?error=1');
        exit();
    }
} else {
    // Redirigir si se intenta acceder directamente a este script sin enviar el formulario
    header('Location: login.php');
    exit();
}
?>

