<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
<?php
require_once('modelo.php');
$obj= new clase_institucion();
$result=$obj->_actualizar(
    $_POST['txt_titul1'],
    $_POST['txt_titul2'],
    $_POST['txt_titul3']
    );
if($result)
{
    echo '<script>jQuery(function(){swal({
        title:"Actualización Datos de Institución", text:"Datos guardados correctamente", type:"success", confirmButtonText:"Aceptar"
    }, function(){location.href="../vista_cont.html";});});</script>';
}
else
{
    echo '<script>jQuery(function(){swal({
        title:"Actualizar datos de Institución", text:"Error al Actualizar", type:"danger", confirmButtonText:"Aceptar"
    }, function(){location.href="../vista_cont.html";});});</script>';
}
?>