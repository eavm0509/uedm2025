<?php
include '../../../login/verificar_sesion3n_mixto.php'; 
?>
<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
<?php
require_once('modelo.php');
$obj= new clase_notas_registro();
$result=$obj->_actualizar(
    $_POST['txt_descri'],
    $_POST['chk_ingnot'],
    $_POST['txt_porcen'],
    $_POST['txt_codigo']);

    $xcodper = urlencode(trim($_POST['txt_codper']));
    $xcodmat = urlencode(trim($_POST['txt_codmat']));
if ($result) {
    echo '<script>
    jQuery(function() {
        swal({
            title: "Registro",
            text: "Registro Actualizado",
            type: "success",
            confirmButtonText: "Aceptar"
        }, function() {
            location.href = "../vistas/registro_crud.php?_codper=' . $xcodper . '&_codmat=' . $xcodmat . '";
        });
    });
    </script>';
} else {
    echo '<script>
    jQuery(function() {
        swal({
            title: "Registro",
            text: "Error al Actualizar",
            type: "error",
            confirmButtonText: "Aceptar"
        }, function() {
            location.href = "../vistas/registro_crud.php?_codper=' . $xcodper . '&codmat=' . $xcodmat . '";
        });
    });
    </script>';
}

?>