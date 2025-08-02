<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'Administrativo') {
    header("Location: ../../../login/index.php");
    exit();
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'inicio';
}
switch ($page) {
    case 'movimcsn':
        include 'crud.php';
        break;
    case 'inicio':
    default:
        include '../../../admin.php';
        break;
}

?>
