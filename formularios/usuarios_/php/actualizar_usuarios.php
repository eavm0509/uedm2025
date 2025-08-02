<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('modelo.php');
?>

<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>

<?php
$obj = new clase_usuarios();

// Datos del formulario
$codigo       = $_POST['txt_codigo'];
$nombre       = $_POST['txt_nombre'];
$tipo_usuario = $_POST['cmb_nombre'];
$usuario      = $_POST['txt_cedula'];
$observacion  = $_POST['txt_observ'];
$contrasena1  = $_POST['txt_contrasena'];
$contrasena2  = $_POST['txt_contrasena2'];
$cmb_percod   = $_POST['cmb_percod'];

// Verificar si se quiere actualizar la contraseña
$actualizarClave = false;
$claveHash = "";

if (!empty($contrasena1) && !empty($contrasena2)) {
    if ($contrasena1 !== $contrasena2) {
        echo '<script>
jQuery(function(){
    swal({
        title: "Usuario Actualizado",
        text: "Los datos se actualizaron correctamente.",
        type: "success",
        confirmButtonText: "Aceptar"
    }, function(){
        location.href="../vistas/crud.php";
    });
});
</script>';

        exit();
    } else {
        $actualizarClave = true;
        $claveHash = $contrasena1; // SIN ENCRIPTAR

    }
}

// Ejecutar actualización
$result = $obj->_actualizar_usuario_completo(
    $codigo,
    $nombre,
    $tipo_usuario,
    $usuario,
    $observacion,
    $claveHash,
    $actualizarClave, 
    $cmb_percod // le pasamos este booleano para saber si actualizar o no la clave
);

// Respuesta
if ($result) {
    echo '<script>jQuery(function(){
        swal({
            title: "Usuario Actualizado",
            text: "Los datos se actualizaron correctamente.",
            type: "success",
            confirmButtonText: "Aceptar"
        }, function(){
            location.href = "../vistas/crud.php";
        });
    });</script>';
} else {
    echo '<script>jQuery(function(){
        swal({
            title: "Error",
            text: "No se pudo actualizar el usuario.",
            type: "error",
            confirmButtonText: "Aceptar"
        }, function(){
            location.href = "../vistas/crud.php";
        });
    });</script>';
}
?>
