<?php
// session_start();
// if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Inspector') {
//     header("Location: login/form_login.php");
//     exit();
// }

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Inspector</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem;
            text-align: center;
            position: relative;
        }
        .logout {
            position: absolute;
            right: 20px;
            top: 20px;
        }
        main {
            padding: 2rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido, Inspector</h1>
        <a href="login/form_login.php" class="btn btn-outline-light logout">Cerrar sesión</a>
    </header>

    <main>
        <p>Este panel está en construcción.</p>
    </main>
</body>
</html>
