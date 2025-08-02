<?php
// session_start();
// if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Estudiante') {
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
    <title>Panel Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
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
        .option-link {
            display: block;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            background-color: #ecf0f1;
            border-radius: 5px;
            text-decoration: none;
            color: #2980b9;
            font-weight: bold;
            transition: background-color 0.3s ease;
            width: fit-content;
        }
        .option-link:hover {
            background-color: #d0d7de;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido, Estudiante</h1>
        <a href="login/form_login.php" class="btn btn-outline-light logout">Cerrar sesión</a>
    </header>

    <main class="container">
        <a href="formularios/calificaciones/index.php" class="option-link">Calificaciones</a>
    </main>
</body>
</html>
