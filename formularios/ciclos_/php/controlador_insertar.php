<?php
    include '../../../login/verificar_sesion3n_mixto.php';
    require_once('modelo.php');
?>

<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>

<?php
    $obj = new clase_ciclos();
    $result=$obj->_insertar(
    $_POST['txt_nombre'],
    $_POST['txt_observacion']);
    
    if($result)
    {
        echo '<script>jQuery(function(){swal({
            title:"Guardar Ciclo", text:"Registro Guardado", type:"success", confirmButtonText:"Aceptar"
        }, function(){location.href="../vistas/crud.php";});});</script>';
    }
    else
    {
        echo '<script>jQuery(function(){swal({
            title:"Guardar Ciclo", text:"Error al Guardar", type:"danger", confirmButtonText:"Aceptar"
        }, function(){location.href="../vistas/crud.php";});});</script>';
    }

?>
