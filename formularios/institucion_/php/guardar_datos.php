<?php
include '../../../login/verificar_sesion3n_mixto.php';
// Ruta de destino
$ruta_destino = "../uploads/";

// Lista de campos de archivos
$archivos = [
    "sello_primaria",
    "sello_secundaria",
    "escudo",
    "sello_ld"
];

foreach ($archivos as $campo) {
    if (isset($_FILES[$campo]) && $_FILES[$campo]['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES[$campo]['tmp_name'];
        $nombre_original = basename($_FILES[$campo]['name']);
        $ruta_final = $ruta_destino . $nombre_original;

        // Mover archivo a la carpeta de destino
        if (move_uploaded_file($tmp_name, $ruta_final)) {
            echo "$campo subido correctamente.<br>";
        } else {
            echo "Error al subir $campo.<br>";
        }
    } else {
        echo "$campo no fue enviado o tiene errores.<br>";
    }
}
?>
