<?php
session_start();
require_once("../conexion/conexion.php");
try {
    $pdo = (new Conexion())->getConexion();
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

// Si ya hay sesión activa, redirige según rol
if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] === 'Administrativo') {
        header("Location: ../admin.php");
    } else if ($_SESSION['rol'] === 'ppff') {
        header("Location: ../login.php");
    } else if ($_SESSION['rol'] === 'Docente') {
        header("Location: ../docente.php");
    }
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'] ?? '';
    $clave  = $_POST['clave'] ?? '';

    $sql = "SELECT * 
            FROM snp_repr 
            WHERE REP_CEDULA = :cedula AND REP_CLAVE = :clave";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cedula', $cedula);
    $stmt->bindParam(':clave', $clave);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $id = $row['REP_CODIGO'];
        $_SESSION['rol'] = 'ppff'; // ✅ AHORA GUARDAMOS EL ROL
        $_SESSION['_codigo_'] = $row['REP_CODIGO'];
        $_SESSION['apenom'] = $row['REP_APENOM'];
        header("Location: ../login.php?_identi=$id"); // O a donde quieras
        exit();
    } else {
        echo "<script>alert('Cédula o clave incorrecta');window.location='index.php';</script>";
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión PPFF</title>
    <style>
    .login-container {
        width: 300px;
        margin: 50px auto;
        padding: 25px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        text-align: center;
    }

    .login-container h2 {
        margin-bottom: 20px;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: 90%;
        padding: 10px;
        margin: 10px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .login-container input[type="submit"] {
        width: 90%;
        padding: 10px;
        background-color: #4285f4;
        border: none;
        border-radius: 5px;
        color: white;
        font-weight: bold;
        cursor: pointer;
        margin-top: 10px;
    }

    .login-container input[type="submit"]:hover {
        background-color: #3367d6;
    }

    .login-container a {
        display: block;
        margin-top: 15px;
        color: #4285f4;
        text-decoration: none;
        font-size: 0.95em;
    }

    .login-container a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Iniciar Sesión PPFF</h2>
        <form method="POST" action="index.php">
            <input type="text" name="cedula" placeholder="Cédula" required>
            <input type="password" name="clave" placeholder="Clave" required>
            <input type="submit" value="Ingresar">
        </form>
        <a href="recuperar_contrasena.php">¿Olvidaste tu contraseña?</a>
    </div>
</body>
</html>

