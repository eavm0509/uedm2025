<?php
include '../../../login/verificar_sesion3n_mixto.php'; 
header('Content-Type: application/json'); 
require_once('modelo.php');

$datos = ["v_nombre" => "", "v_descri" => ""];
$obj = new clase_notas_registro();

$row = $obj->_consultarcodigo($_POST['codigo']);
$fila = $row ? $row->fetch() : false;

if ($fila) {
    $datos = [
        "v_nombre" => $fila['ASIG_NOMBRE'],
        "v_descri" => $fila['REG_DESCRI']
    ];
}

echo json_encode($datos);
?>
