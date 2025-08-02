<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//if (!isset($_SESSION['rol'])) {
    // Devuelve error si se llama desde JS
//    header('Content-Type: application/json');
//    echo json_encode(['error' => 'Sesión expirada']);
//    exit;
//}

// Permitir si el rol es Padre de familia o Administrativo
if (!isset($_SESSION['rol']) || 
    ($_SESSION['rol'] !== 'ppff' && $_SESSION['rol'] !== 'Administrativo' 
                                 && $_SESSION['rol'] !== 'Docente')) {
        header("Location: ../../../login/index.php");
    exit();
}


?>
