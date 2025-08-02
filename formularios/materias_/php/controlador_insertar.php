<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>

<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>

<?php
require_once('modelo.php');

$obj = new clase_materias();
$result=$obj->_insertar(
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
    $_POST['txt_observ']);
    

if ($result) {
    echo '<script>
        jQuery(function(){
            swal({
                title: "Guardar Materia",
                text: "Registro de materia guardado con éxito",
                type: "success",
                confirmButtonText: "Aceptar"
            }, function(){
                location.href = "../vistas/crud.php";
            });
        });
    </script>';
} else {
    echo '<script>
        jQuery(function(){
            swal({
                title: "Guardar Materia",
                text: "Error al Guardar",
                type: "error",
                confirmButtonText: "Aceptar"
            }, function(){
                location.href = "../vistas/crud.php";
            });
        });
    </script>';
}
?>
