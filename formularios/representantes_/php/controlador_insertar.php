<?php
    include '../../../login/verificar_sesion3n_mixto.php';
?>
<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
<?php
    require_once('modelo.php');
    $obj = new clase_representantes();
    $result=$obj->_insertar(
    $_POST['txt_cedula'],
    $_POST['txt_apenom'],
    $_POST['txt_correo'],
    $_POST['chk_suspen']
    );
    $identificador = $_POST['txt_identificador'];
    if($result)
    {
        
        echo "<script>
    var identificador = " . intval($identificador) . ";
    jQuery(function() {
        swal({
            title: 'Guardar',
            text: 'Registro de representante guardado con éxito',
            type: 'success',
            confirmButtonText: 'Aceptar'
        }, function() {
            if (identificador === 1) {
                location.href = '../vistas/index.php?page=movimcsn';
            } else {
                sessionStorage.setItem('recargarCombo', '2');
                window.history.back();
                window.history.back();
            }
        });
    });
</script>";

    }
      
    else
    {
        echo '<script>jQuery(function(){swal({
            title:"Guardar", text:"Error al Guardar", type:"danger", confirmButtonText:"Aceptar"
        }, function(){location.href="../vistas/index.php?page=movimcsn";});});</script>';
    }
?>
