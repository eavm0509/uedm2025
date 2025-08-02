<?php
session_start();
require_once("../../conexion/conexion.php");

// Validar sesión del docente
if (isset($_SESSION['USE_CODI'])) {
    $usuario_id = $_SESSION['USE_CODI'];
} else {
    die("Error: No se ha iniciado sesión o falta el código del usuario.");
}

$conexionDB = new Conexion();
$db = $conexionDB->getConexion();

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nueva_clave = $_POST["nueva_clave"];
    $confirmar_clave = $_POST["confirmar_clave"];

    if ($nueva_clave === $confirmar_clave) {
        try {
            // Clave sin encriptar (como en representantes)
            $sql = "UPDATE snp_user SET USE_CLAV = :clave WHERE USE_CODI = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":clave", $nueva_clave); // 🔓 Clave sin encriptar
            $stmt->bindParam(":id", $usuario_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $mensaje = "Clave actualizada con éxito.";
            } else {
                $mensaje = "Error al actualizar la clave.";
            }

        } catch (PDOException $e) {
            $mensaje = "Error de base de datos: " . $e->getMessage();
        }
    } else {
        $mensaje = "Las contraseñas no coinciden.";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Clave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Actualizar Clave</h3>
    <form method="POST">
        <div class="mb-3">
            <label for="nueva_clave" class="form-label">Nueva clave</label>
            <input type="password" class="form-control" id="nueva_clave" name="nueva_clave" required>
        </div>
        <div class="mb-3">
            <label for="confirmar_clave" class="form-label">Confirmar clave</label>
            <input type="password" class="form-control" id="confirmar_clave" name="confirmar_clave" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="../../docente.php" class="btn btn-secondary">Volver</a>
    </form>
    <?php if ($mensaje): ?>
        <div class="alert alert-info mt-3"><?php echo $mensaje; ?></div>
    <?php endif; ?>
</div>
</body>
</html>