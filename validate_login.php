<?php
// Simulación de lógica de autenticación
$valid_users = array(
    'admin' => 'admin123',
    'usuario' => 'usuario123'
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar las credenciales
    if (array_key_exists($username, $valid_users) && $valid_users[$username] === $password) {
        // Autenticación exitosa, redirigir según el perfil
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
