<?php
include '../../../login/verificar_sesion3n_mixto.php';
    require_once('modelo.php');
?>

<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>

<?php
    $obj = new clase_asignaturas();
    $result=$obj->_insertar(
    $_POST['txt_nombre'],
    $_POST['txt_observ']
    );
    
    if($result)
    {
        echo '<script>jQuery(function(){swal({
            title:"Guardar Asignatura", text:"Registro de asignatura guardado con éxito", type:"success", confirmButtonText:"Aceptar"
        }, function(){location.href="../vistas/index.php?page=movimcsn";});});</script>';
    }
    else
    {
        echo '<script>jQuery(function(){swal({
            title:"Guardar Asignatura", text:"Error al Guardar", type:"danger", confirmButtonText:"Aceptar"
        }, function(){location.href="../vistas/index.php?page=movimcsn";});});</script>';
    }

     //require_once('vistasinestilo.html');
?>
