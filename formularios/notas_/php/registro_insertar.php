<?php
    include '../../../login/verificar_sesion3n_mixto.php';
?>
<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>

<?php
    require_once('modelo.php');
    $obj = new clase_notas_registro();
    $result = $obj->_insertar(
        $_POST['txt_codmat'],
        $_POST['txt_descri'],
        $_POST['chk_ingnot'],
        $_POST['txt_porcen']
    );
$xcodmat = urlencode(trim($_POST['txt_codmat']));
$xcodper = urlencode(trim($_POST['txt_codper']));
 if ($result) {
    echo '<script>
        setTimeout(function() {
            window.location.href = "../vistas/registro_crud.php?_codper='. $xcodper . '&_codmat=' . $xcodmat . '";
        }, 500);
    </script>';
} else {
    echo '<script>
        jQuery(function(){
            swal({
                title: "Guardar Registro",
                text: "Error al Guardar",
                type: "error",
                confirmButtonText: "Aceptar"
            }, function(){
                window.location.href = "../vistas/index.php"; // 🔁 También aquí
            });
        });
    </script>';
}