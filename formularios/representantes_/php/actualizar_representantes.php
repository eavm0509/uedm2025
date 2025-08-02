<?php
    include '../../../login/verificar_sesion3n_mixto.php';
?>
<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
<?php
require_once('modelo.php');
$obj= new clase_representantes();
$result=$obj->_actualizar(
    $_POST['txt_cedula'],
    $_POST['txt_apenom'],
    $_POST['txt_correo'],
    $_POST['chk_suspen'],
    $_POST['txt_codigo']);
if($result)
{
    echo '<script>jQuery(function(){swal({
        title:"Actualización", text:"Registro Actualizado", type:"success", confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/index.php?page=movimcsn";});});</script>';
}
else
{
    echo '<script>jQuery(function(){swal({
        title:"Actualización", text:"Error al Actualizar", type:"danger", confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/index.php?page=movimcsn";});});</script>';
}
?>