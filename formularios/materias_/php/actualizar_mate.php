<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
<?php
require_once('modelo.php');
include '../../../login/verificar_sesion3n_mixto.php';
$obj= new clase_materias();
$result=$obj->_actualizar(
   $_POST['cmb_codcur'],
    $_POST['cmb_codper'],
    $_POST['cmb_codasi'],
    $_POST['cmb_areid'],
    $_POST['rad_tipo'],
    $_POST['txt_orden'],
    $_POST['chk_resalt'],
    $_POST['chk_oculta'],
    $_POST['chk_ambito'],
    $_POST['txt_ponder'],
    $_POST['chk_destreza'],
    $_POST['txt_nhoras'],
    $_POST['txt_observ'],
    $_POST['txt_codigo']);
if($result)
{
    echo '<script>jQuery(function(){swal({
        title:"Actualización de materia", text:"Registro Actualizado", type:"success", confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/index.php?page=movimcsn";});});</script>';
}
else
{
    echo '<script>jQuery(function(){swal({
        title:"Actualización de materia", text:"Error al Actualizar", type:"danger", confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/index.php?page=movimcsn";});});</script>';
}
?>