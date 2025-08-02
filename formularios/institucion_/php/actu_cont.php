<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
<?php
require_once('modelo.php');
$obj= new clase_institucion();

$result = $obj->_actualizar(
    $_POST['txt_titul1'],
    $_POST['txt_titul2'],
    $_POST['txt_titul4'],
    $_POST['txt_titul5'],
    $_POST['txt_ruc'],
    $_POST['txt_titul3'],
    $_POST['txt_desano'],
    $_POST['txt_ordina'],
    $_POST['txt_fecini'],
    $_POST['txt_provin'],
    $_POST['txt_fecgra'],
    $_POST['txt_sigrec'],
    $_POST['txt_rector'],
    $_POST['txt_sigvr'],
    $_POST['txt_vicere'],
    $_POST['txt_sigpv'],
    $_POST['txt_privoc'],
    $_POST['txt_sigsv'],
    $_POST['txt_segvoc'],
    $_POST['txt_sigtv'],
    $_POST['txt_tervoc'],
    $_POST['txt_sigsec'],
    $_POST['txt_secret'],
    $_POST['txt_sigins'],
    $_POST['txt_inspec'],
    $_POST['txt_sigcol'],
    $_POST['txt_colec']
);

if($result) {
    echo '<script>
        jQuery(function() {
            swal({
                title: "Actualización Datos de Institución",
                text: "Datos guardados correctamente",
                type: "success",
                confirmButtonText: "Aceptar"
            }, function() {
                location.href="../vista_cont.html";
            });
        });
    </script>';
} else {
    echo '<script>
        jQuery(function() {
            swal({
                title: "Actualizar datos de Institución",
                text: "Error al Actualizar",
                type: "error",
                confirmButtonText: "Aceptar"
            }, function() {
                location.href="../vista_cont.html";
            });
        });
    </script>';
}
?>
