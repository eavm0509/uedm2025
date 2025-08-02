<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('modelo.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $notas = $_POST['txt_nota'];
    $matriculas = $_POST['not_nmatri'];
    $registros = $_POST['not_regist'];
    $xcodper = $_POST['txt_codper'];
    $xcodmat = $_POST['txt_codmat'];
    

    $obj_regi = new clase_notas_registro();
    $guardados = 0;
    $huboCambios = false;

    for ($i = 0; $i < count($notas); $i++) {
        $nota = trim($notas[$i]);
        $matricula = intval($matriculas[$i]);
        $registro = intval($registros[$i]);

        if ($nota !== '') {
            $yaExiste = $obj_regi->_consultar_notas($matricula, $registro);

            if ($yaExiste && $yaExiste->rowCount() > 0) {
                $obj_regi->_actualizar_notas($nota, $matricula, $registro);
            } else {
                $obj_regi->_insertar_notas($nota, $matricula, $registro);
            }

            $guardados++;
            $huboCambios = true;
        }
    }

    // Mostrar SweetAlert
    $mensaje = $huboCambios
        ? "Notas guardadas correctamente ($guardados registro(s))."
        : "No se realizaron cambios.";

    $tipo = $huboCambios ? "success" : "warning";

    echo "
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@8'></script>
    <script>
        $(function(){
            Swal.fire({
                title: 'Guardar Registro',
                text: '$mensaje',
                type: '$tipo',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = '../vistas/registro_crud.php?_codper=$xcodper&_codmat=$xcodmat';
                
            });
        });
    </script>";
}
?>