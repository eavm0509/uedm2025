<?php
#include 'login/verificar_sesion3n.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'inicio';
}
switch ($page) {
    case 'admcsn':
        include '../admin.php';
        break;
    case 'inicio':
        include 'login/index.php';
        break;
}

?>

