<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['rol'])) //|| $_SESSION['rol'] != 'ppff') 
    {
    //header("Location: ../../../login/index.php");
    //exit();
        switch ($_SESSION['rol']) {
            case 'Administrativo':
                header("Location: ../../../admin/index.php");
                break;
            case 'ppff':
                header("Location: ../../../login/index.php");
                break;
            case 'Docente':
                header("Location: ../../../docente/index.php");
                break;
            default:
                // Código si no coincide con ningún caso
        } 
    exit();
}
?>