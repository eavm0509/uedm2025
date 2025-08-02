<?php
include '../../../login/verificar_sesion3n_mixto.php'; 
?>
<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
<?php
require_once('../php/modelo.php');
$obj= new clase_representantes();
$result=$obj->_actualizar_ppff(
    $_POST['txt_cedula'],
    $_POST['txt_apenom'],
    $_POST['txt_fecnac'],
    $_POST['rad_sexo'],
    $_POST['cmb_estciv'],
    $_POST['txt_domici'],
    $_POST['txt_teldom'],
    $_POST['txt_trabaj'],
    $_POST['txt_dirtra'],
    $_POST['txt_teltra'],
    $_POST['txt_profes'],
    $_POST['txt_fecing'],
    $_POST['txt_nacion'],
    $_POST['txt_correo'],
    $_POST['txt_movilw'],
    $_POST['txt_contac'],
    $_POST['txt_telcon'],
    $_POST['txt_observ'],    
    $_POST['txt_codigo']);
if($result)
{
    echo '<script>jQuery(function(){swal({
        title:"Actualización", text:"Registro Actualizado", type:"success", confirmButtonText:"Aceptar"
    }, function(){location.href="../../../login.php";});});</script>';
}
else
{
    echo '<script>jQuery(function(){swal({
        title:"Actualización", text:"Error al Actualizar", type:"danger", confirmButtonText:"Aceptar"
    }, function(){location.href="../../../login.php";});});</script>';
}
?>