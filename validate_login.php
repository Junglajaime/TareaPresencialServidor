<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $recuerdame = isset($_POST['recuerdame']) ? $_POST['recuerdame'] : "off";
    $mantener = isset($_POST['mantener']) ? $_POST['mantener'] : "off";

    // Verificar las credenciales según el tipo de usuario
    if (($username === 'admin' && $password === 'admin') || ($username === 'user' && $password === 'user')) {
        // Iniciar sesión y manejar opciones de recordar/mantener
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = ($username === 'admin') ? 'admin' : 'user';

        // Contar accesos y actualizar última visita si no se mantiene la sesión abierta
        if (!isset($_SESSION['accesos'])) {
            $_SESSION['accesos'] = 1;
            $_SESSION['ultima_visita'] = date('d/m/Y');
        } else {
            $_SESSION['accesos']++;
            if ($mantener !== 'on') {
                $_SESSION['ultima_visita'] = date('d/m/Y');
            }
        }

        // Recordar sesión mediante cookie si la opción está marcada
        if ($recuerdame === 'on') {
            $cookie_name = 'remember_me';
            $cookie_value = base64_encode(json_encode(['username' => $username, 'role' => $_SESSION['role']]));
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        }

        // Redirigir según el perfil
        if ($username === 'admin') {
            header('Location: users/admin.php');
        } else {
            header('Location: users/users.php');
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