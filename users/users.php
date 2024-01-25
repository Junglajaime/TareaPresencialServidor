<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}

$role = $_SESSION['role'];
$accesos = $_SESSION['accesos'];
$ultima_visita = $_SESSION['ultima_visita'];

if ($accesos === 1) {
    $mensaje = "Hola, {$role} :)!! Bienvenido/a por primera vez.";
} else {
    $mensaje = "Hola de nuevo, {$role} :)!! Tu última visita fue el {$ultima_visita}.";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perfil Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Perfil de Usuario</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-center"><?php echo $mensaje; ?></p>
                        <p class="text-center">Número total de accesos: <?php echo $accesos; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
