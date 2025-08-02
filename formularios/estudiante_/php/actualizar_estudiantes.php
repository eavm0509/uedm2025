<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('modelo.php');

// Incluir SweetAlert y jQuery
?>
<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>

<?php
// Suponiendo que usas un campo llamado 'txt_fotogr'
if (isset($_FILES['txt_fotogr']) && $_FILES['txt_fotogr']['error'] === UPLOAD_ERR_OK) {
    if (file_exists($_POST['txt_imagen'])) {
        unlink($_POST['txt_imagen']);
    }
    $nombre_tmp = $_FILES['txt_fotogr']['tmp_name'];
    $nombre_archivo = basename($_FILES['txt_fotogr']['name']);
    $carpeta_destino = '../../../uploads/fotos/';

    // Opcional: renombrar archivo para evitar duplicados
    $nuevo_nombre = uniqid() . "_" . $nombre_archivo;
    $ruta_destino = $carpeta_destino . $nuevo_nombre;

    // Mover archivo al servidor
    if (move_uploaded_file($nombre_tmp, $ruta_destino)) {
        // Guardar la ruta en la base de datos
        // Ejemplo:
        // $sql = "UPDATE estudiantes SET ALU_FOTOGR = '$ruta_destino' WHERE ALU_CODIGO = ... ";
        //echo "Imagen subida con éxito.";
    } else {
        echo "Error al mover el archivo.";
    }
} else {
    //echo "No se seleccionó ninguna imagen.";
    $ruta_destino=$_POST['txt_imagen'];
}
 


// ✅ Evitar warnings para campos radiales
$sexo         = $_POST['rad_sexo'] ?? null;
$tipo         = $_POST['rad_tipo'] ?? null;

$obj = new clase_estudiantes();
$result = $obj->_actualizar(
    $_POST['txt_fecing'] ?? null,
    $_POST['txt_fmatri'] ?? null,
    $_POST['txt_matric'] ?? null,
    $_POST['txt_nfolio'] ?? null,
    $_POST['txt_fnacer'] ?? null,
    $_POST['cmb_curso'] ?? null,
    $_POST['txt_estciv'] ?? null,
    $sexo,
    $tipo,
    $_POST['chk_ordina'] ?? null,
    $_POST['chk_nuevo'] ?? null, 
    $_POST['chk_repite'] ?? null,
    $_POST['chk_retirado'] ?? null,
    $_POST['txt_fecret'] ?? null,
    $ruta_destino,
    $_POST['txt_cedula'] ?? null,
    $_POST['txt_nacion'] ?? null,
    $_POST['txt_nombre'] ?? null,
    $_POST['txt_lnacer'] ?? null,
    $_POST['txt_diredo'] ?? null,
    $_POST['txt_teledo'] ?? null,
    $_POST['txt_telest'] ?? null,
    $_POST['txt_emaest'] ?? null,
    $_POST['txt_discap'] ?? null,
    $_POST['txt_ncadis'] ?? null,
    $_POST['txt_enferm'] ?? null,
    $_POST['txt_defetn'] ?? null,
    $_POST['txt_colevi'] ?? null,
    $_POST['txt_dicovi'] ?? null,
    $_POST['txt_anoant'] ?? null,
    $_POST['txt_curant'] ?? null,
    $_POST['txt_notdis'] ?? null,
    $_POST['txt_notapr'] ?? null,

    // Madre
    $_POST['txt_cedmdr'] ?? null,
    $_POST['txt_nacmdr'] ?? null,
    $_POST['txt_nommdr'] ?? null,
    $_POST['txt_fnmdr'] ?? null,
    $_POST['txt_ecimdr'] ?? null,
    $_POST['txt_dirmdr'] ?? null,
    $_POST['txt_parmdr'] ?? null,
    $_POST['txt_prvmdr'] ?? null,
    $_POST['txt_canmdr'] ?? null,
    $_POST['txt_ca1mdr'] ?? null,
    $_POST['txt_ca2mdr'] ?? null,
    $_POST['txt_ncamdr'] ?? null,
    $_POST['txt_barmdr'] ?? null,
    $_POST['txt_telmdr'] ?? null,
    $_POST['txt_emamdr'] ?? null,
    $_POST['txt_promdr'] ?? null,
    $_POST['txt_nedmdr'] ?? null,
    $_POST['txt_tramdr'] ?? null,
    $_POST['txt_lutmdr'] ?? null,

    // Padre
    $_POST['txt_cedpdr'] ?? null,
    $_POST['txt_nacpdr'] ?? null,
    $_POST['txt_nompdr'] ?? null,
    $_POST['txt_fnpdr'] ?? null,
    $_POST['txt_ecipdr'] ?? null,
    $_POST['txt_dirpdr'] ?? null,
    $_POST['txt_parpdr'] ?? null,
    $_POST['txt_prvpdr'] ?? null,
    $_POST['txt_canpdr'] ?? null,
    $_POST['txt_ca1pdr'] ?? null,
    $_POST['txt_ca2pdr'] ?? null,
    $_POST['txt_ncapdr'] ?? null,
    $_POST['txt_barpdr'] ?? null,
    $_POST['txt_telpdr'] ?? null,
    $_POST['txt_emapdr'] ?? null,
    $_POST['txt_propdr'] ?? null,
    $_POST['txt_nedpdr'] ?? null,
    $_POST['txt_trapdr'] ?? null,
    $_POST['txt_lutpdr'] ?? null,

    // Representante
    $_POST['cmb_codrpr'] ?? null,
    $_POST['txt_relrpr'] ?? null,
    $_POST['txt_observ'] ?? null,
    //CODIGO DE ESTUDIANTE
    $_POST['txt_codigo'] ?? null
);

if ($result) {
    echo '<script>jQuery(function(){swal({
        title:"Actualización de estudiante",
        text:"Registro Actualizado correctamente",
        type:"success",
        confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/index.php?page=movimcsn";});});</script>';
} else {
    echo '<script>jQuery(function(){swal({
        title:"Actualización de estudiante",
        text:"Error al actualizar",
        type:"error",
        confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/index.php?page=movimcsn";});});</script>';
}
?>

