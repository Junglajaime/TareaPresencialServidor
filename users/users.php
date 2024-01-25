<?php
session_start();

// Verificar si la cookie de recordar existe y no hay sesión activa
if (!isset($_SESSION['username']) && isset($_COOKIE['remember_me'])) {
    $remember_data = json_decode(base64_decode($_COOKIE['remember_me']), true);

    // Establecer sesión desde la cookie
    $_SESSION['username'] = $remember_data['username'];
    $_SESSION['role'] = $remember_data['role'];
}

// Verificar si el usuario no está logueado
if (!isset($_SESSION['username'])) {
    $_SESSION['error_message'] = "Acceso no autorizado. Por favor, inicie sesión.";
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}

$role = $_SESSION['role'];
$accesos = $_SESSION['accesos'];
$ultima_visita = $_SESSION['ultima_visita'];

// Verificar si la última opción está almacenada en la sesión
$ultima_opcion = isset($_SESSION['ultima_opcion']) ? $_SESSION['ultima_opcion'] : '';

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
    <title>Perfil de Usuario</title>
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
                        <div class="text-center">
                            <a href="options/c.php?opcion=c" id="c" class="btn btn-info">Opción C</a>
                            <a href="options/d.php?opcion=d" id="d" class="btn btn-warning">Opción D</a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="users.php" class="btn btn-success">Volver...</a>
                            <a href="logout.php" class="btn btn-danger">Salir...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Establecer la opción seleccionada por defecto al cargar la página
        $(document).ready(function () {
            var ultimaOpcion = "<?php echo $ultima_opcion; ?>";
            if (ultimaOpcion !== '') {
                $('#' + ultimaOpcion).addClass('active');
            }
        });
    </script>
</body>
</html>