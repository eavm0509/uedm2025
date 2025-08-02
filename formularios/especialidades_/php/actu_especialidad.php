<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('modelo.php');
?>

<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>

<?
$obj= new clase_especialidades();
$result=$obj->_actualizar(
    $_POST['txt_codigo'],
    $_POST['txt_nombre'],
    $_POST['txt_titulo'],
    $_POST['txt_titulo1'],
    $_POST['txt_observ']);
if($result)
{
    echo '<script>jQuery(function(){swal({
        title:"Actualizar Especialidad", text:"Registro Actualizado", type:"success", confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/crud.php";});});</script>';
}
else
{
    echo '<script>jQuery(function(){swal({
        title:"Actualizar Especialidad", text:"Error al Actualizar", type:"danger", confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/crud.php";});});</script>';
}
?>