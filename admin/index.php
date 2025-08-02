<?php
session_start();
include("../Connections/paginalocal.php"); // Ya define $pdo

// Si ya hay sesión activa, redirige según el rol
if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 'Administrativo':
            header("Location: ../admin.php");
            exit();
        case 'Colector':
            header("Location: ../index.php");
            exit();
        case 'Docente':
            header("Location: ../docente.php");
            exit();
        case 'Inspector':
            header("Location: ../formularios/inspector/index.php");
            exit();
     }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['correo'] ?? '';
    $clave = $_POST['clave'] ?? '';

    $sql = "SELECT u.*, r.ROL_NOMBRE 
            FROM snp_user u 
            JOIN snp_roles r ON u.USE_TIPO = r.ROL_ID 
            WHERE u.USE_USER = :correo AND u.USE_CLAV = :clave";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':correo', $usuario);
    $stmt->bindParam(':clave', $clave);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $rol = strtolower(trim($row['ROL_NOMBRE']));

        switch ($rol) {
            case 'administrador':
                $_SESSION['rol'] = 'Administrativo';
                $_SESSION['apenom'] = $row['USE_APNO'];
                header("Location: ../admin.php");
                break;
            case 'colector':
                $_SESSION['rol'] = 'Colector';
                header("Location: ../colector.php");
                break;
            case 'docente':
                $_SESSION['rol'] = 'Docente';
                $_SESSION['apenom'] = $row['USE_APNO'];
                $_SESSION['USE_CODI'] = $row['USE_CODI'];
                $_SESSION['_codper'] = $row['USE_CODPER'];
                header("Location: ../docente.php");
                break;
            case 'inspector':
                $_SESSION['rol'] = 'Inspector';
                header("Location: ../inspector.php");
                break;
            default:
                echo "Rol no autorizado.";
                break;
        }
    } else {
        echo "Usuario o clave incorrectos.";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
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
        text-align: center; /* Centra el contenido interno */
    }

    .login-container h2 {
        margin-bottom: 20px;
    }

    .login-container input[type="email"],
    .login-container input[type="password"],
    .login-container input[type="text"] {
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
        <h2>Iniciar Sesión</h2>
        <form method="POST" action="index.php">
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="clave" placeholder="Contraseña" required>
            <input type="submit" value="Ingresar">
        </form>
        <a href="recuperar_contrasena.php">¿Olvidaste tu contraseña?</a>
    </div>
</body>
</html>
