<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('modelo.php');
ob_clean(); // Limpia cualquier salida previa, si la hay
header('Content-Type: application/json');
$obj = new clase_usuarios();
// Revisión del POST
//if (!isset($_POST['codigo'])) {
//    echo json_encode(['error' => 'No llegó el código']);
//    exit;
//}
$row = $obj->_consultarcodigo($_POST['codigo']); //$_POST['codigo']
$fila = $row->fetch(PDO::FETCH_ASSOC);
if ($fila) {
    echo json_encode(["v_nombre" => $fila['USE_APNO'],"v_observ" => $fila['USE_OBSERV']]);
} else {
    echo json_encode(['error' => 'No se encontró el registro']);
}
?>
