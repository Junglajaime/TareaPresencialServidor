<?php
// Verificar la sesión de usuario o redirigir al inicio de sesión
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'usuario') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Panel de Usuario</h3>
            </div>
            <div class="card-body">
                <p>Bienvenido, <?php echo $_SESSION['username']; ?>!</p>
                <ul>
                    <li><a href="a.php">Opción A</a></li>
                    <li><a href="b.php">Opción B</a></li>
                    <li><a href="c.php">Opción C</a></li>
                    <li><a href="d.php">Opción D</a></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
