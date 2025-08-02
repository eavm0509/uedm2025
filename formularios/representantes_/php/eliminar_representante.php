<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
<?php
require_once('modelo.php');
$obj = new clase_representantes();

// Limpiamos el valor recibido (por seguridad)
$codigo = isset($_POST['txt_codigo']) ? intval($_POST['txt_codigo']) : 0;

try {
    $result = $obj->_eliminar($codigo);

    // Verificamos resultado según lo que devuelve _eliminar
    if ($result) {
        $mensaje = [
            'titulo' => 'Representante',
            'texto'  => '✅ Registro eliminado correctamente.',
            'tipo'   => 'success'
        ];
    } else {
        $mensaje = [
            'titulo' => 'Representante',
            'texto'  => '❌ No se pudo eliminar el registro.',
            'tipo'   => 'error'
        ];
    }
} catch (PDOException $e) {
    if ($e->getCode() == '23000') {
        $mensaje = [
            'titulo' => 'Error de integridad',
            'texto'  => '❌ No se puede eliminar: el registro está relacionado con otras tablas.',
            'tipo'   => 'warning'
        ];
    } else {
        $mensaje = [
            'titulo' => 'Error inesperado',
            'texto'  => '❌ Error al eliminar: ' . $e->getMessage(),
            'tipo'   => 'error'
        ];
    }
}

// Mostrar mensaje con SweetAlert y redirigir
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert/dist/sweetalert.min.js"></script>';
echo '<script>
    jQuery(function(){
        swal({
            title: "' . $mensaje['titulo'] . '",
            text: "' . $mensaje['texto'] . '",
            icon: "' . $mensaje['tipo'] . '",
            buttons: {
                confirm: {
                    text: "Aceptar",
                    visible: true
                }
            }
        }).then(function(){
            location.href = "../vistas/index.php?page=movimcsn";
        });
    });
</script>';
?>

