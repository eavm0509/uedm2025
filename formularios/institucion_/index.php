<?php
include '../../../login/verificar_sesion3n_mixto.php';
header("Location: vista_cont.html");
exit();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Institución</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        main {
            padding: 2rem;
        }
        a {
            display: block;
            margin: 0.5rem 0;
            padding: 0.6rem 1.2rem;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            width: fit-content;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <header>
        <h2>Gestión de Institución</h2>
    </header>
    <main>
        <a href="php/verencabezado.php">📄 Ver Encabezado Institucional</a><br>
        <a href="vista_crud.html">🛠️ Administrar Información</a><br>
        <a href="../../admin.php">← Volver al Panel</a>
    </main>
</body>
</html>
