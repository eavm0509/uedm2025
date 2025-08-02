
<?php
include '../../../login/verificar_sesion3n_mixto.php'; 
if (isset($_FILES['txt_fotogr'])) {
    $archivo = $_FILES['txt_fotogr'];

    if ($archivo['error'] === 0) {
        $nombre = $archivo['name'];
        $tmp = $archivo['tmp_name'];

        // Ruta de destino
        $destino = '../uploads/fotos/' . $nombre;

        // Mover el archivo subido a la carpeta deseada
        if (move_uploaded_file($tmp, $destino)) {
            echo "Archivo subido correctamente: $nombre";
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "Error al subir el archivo.";
    }
}
?>




