<?php
include '../../../login/verificar_sesion3n_mixto.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../../../login/verificar_sesion3n_mixto.php';
require_once('modelo.php');
$obj = new clase_paralelos();
$result = $obj->_insertar($_POST['txt_nombre'], $_POST['txt_observa']);

if ($result) {
    echo '<script>jQuery(function(){swal({
        title:"Guardar Paralelos", text:"Registro Guardado", type:"success", confirmButtonText:"Aceptar"
    }, function(){location.href="../index.php?page=movimcsn";});});</script>';
} else {
    echo '<script>jQuery(function(){swal({
        title:"Guardar Paralelos", text:"Error al Guardar", type:"error", confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/crud.php";});});</script>';
}
?>
