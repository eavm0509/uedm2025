<?php
include '../../../login/verificar_sesion3n_mixto.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'inicio';
}
switch ($page) {
    case 'movimcsn':
        include 'registro_crud.php';
        break;
    case 'inicio':
        include '../../../admin.php';
        break;
}

?>

