<?php
include("../Connections/paginalocal.php");

$token = $_GET['token'] ?? '';

if (!$token) {
    die("Token no proporcionado.");
}

// Verificar que el token exista y no esté expirado
$stmt = $pdo->prepare("SELECT * FROM snp_user WHERE RESET_TOKEN = :token AND RESET_EXPIRATION >= NOW()");
$stmt->execute([':token' => $token]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    die("Token inválido o expirado.");
}

// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nueva_clave = $_POST['nueva_clave'];
    $confirmar_clave = $_POST['confirmar_clave'];

    if ($nueva_clave !== $confirmar_clave) {
        echo "Las contraseñas no coinciden.";
    } else {
        // Actualizar la contraseña y limpiar el token
        $stmt = $pdo->prepare("UPDATE snp_user SET USE_CLAV = :clave, RESET_TOKEN = NULL, RESET_EXPIRATION = NULL WHERE USE_CODI = :id");
        $stmt->execute([
            ':clave' => $nueva_clave, // puedes usar hash si lo deseas
            ':id' => $usuario['USE_CODI']
        ]);
        echo "Contraseña actualizada correctamente. Ahora puedes <a href='index.php'>iniciar sesión</a>.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Restablecer Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input {
            display: block;
            width: 100%;
            margin: 1rem 0;
            padding: 0.7rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 0.7rem 1rem;
            background: #2c3e50;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Restablecer Contraseña</h2>
        <input type="password" name="nueva_clave" placeholder="Nueva contraseña" required>
        <input type="password" name="confirmar_clave" placeholder="Confirmar contraseña" required>
        <button type="submit">Actualizar Contraseña</button>
    </form>
</body>
</html>
