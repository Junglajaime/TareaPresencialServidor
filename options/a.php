<?php
// Verificar la sesión activa o redirigir al inicio de sesión
session_start();

// Verificar si el usuario no está logueado
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Opción A</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Opción A</h3>
            </div>
            <div class="card-body">
                <p>Esta es la página para la Opción A.</p>
                <p>Bienvenido, <?php echo $_SESSION['username']; ?>!</p>
                <p><a href="../logout.php">Cerrar sesión</a></p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php require 'last_session.php'; ?>
</body>
</html>
