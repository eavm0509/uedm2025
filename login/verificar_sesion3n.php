<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'Padre de familia') {
    header("Location: ../../../login/index.php");
    
    exit();
}
?>

