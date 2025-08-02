<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('modelo.php');
?>

<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>

<?php
$obj = new clase_usuarios();

$nombre      = $_POST['txt_nombre'];
$tipoUsuario = $_POST['cmb_nombre'];
$usuario     = $_POST['txt_user'];
$observacion = $_POST['txt_observ'];
$codper = $_POST['cmb_percod'];
$pass1 = $_POST['txt_contrasena'];
$pass2 = $_POST['txt_contrasena2'];

// Primero validamos que coincidan las contraseñas en texto plano
if ($pass1 !== $pass2) {
    echo "<script>
      alert('Las contraseñas no coinciden');
      history.back();
    </script>";
    exit();
}

// Si coinciden, ahora sí encriptamos
//$contrasena_hash = password_hash($pass1, PASSWORD_BCRYPT);
$contrasena_hash = $pass1;


// Ejecutar el método de inserción
$result = $obj->_insertar(
    $nombre,
    $tipoUsuario,
    //$contrasena_hash, // Se envía ya encriptada
    $pass1,
    $usuario,
    $observacion,
    $codper
);

if ($result) {
    echo '<script>
    jQuery(function(){
        swal({
            title: "Usuario Guardado",
            text: "Registro guardado con éxito",
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
            title: "Error",
            text: "Error al guardar usuario",
            type: "error",
            confirmButtonText: "Aceptar"
        }, function(){
            location.href = "../vistas/crud.php";
        });
    });
    </script>';
}
?>
