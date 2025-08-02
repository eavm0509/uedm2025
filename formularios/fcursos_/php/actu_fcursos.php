<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
<?php
require_once('modelo.php');
$obj= new clase_fcursos();
$result=$obj->_actualizar(
    $_POST['cmb_curso'],
    $_POST['cmb_ciclo'],
    $_POST['cmb_seccion'],
    $_POST['cmb_especialidad'],
    $_POST['cmb_paralelo'],
    $_POST['cmb_tutor'],
    $_POST['txt_orden'],
    $_POST['txt_descri'],
    $_POST['txt_jurban'],
    $_POST['rb_tipcon'],
    $_POST['txt_valmat'],
    $_POST['txt_valder'],
    $_POST['txt_numcuo'],
    $_POST['txt_codigo']
    );
if($result)
{
    echo '<script>jQuery(function(){swal({
        title:"Actualizar Año o Curso", text:"Registro Actualizado", type:"success", confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/index.php?page=movimcsn";});});</script>';
}
else
{
    echo '<script>jQuery(function(){swal({
        title:"Actualizar Curso", text:"Error al Actualizar", type:"danger", confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/index.php?page=movimcsn";});});</script>';
}
?>