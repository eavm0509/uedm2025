<?php
include '../../../login/verificar_sesion3n_mixto.php';
header('Content-Type: application/json; charset=utf-8');
require_once('modelo.php');
$obj= new clase_fcursos();
$result=$obj->_consultartodo('');

$datos = $result->fetchAll();
$arrayDatos = [];
// Barrido sobre los resultados de fetchAll()
foreach ($datos as $row) {
    $arrayDatos[] = [
        "codigook" => $row["FCU_COD"],
        "descriok" => $row["FCU_DESCRI"]
    ];
} 
    // Salida en formato JSON , JSON_UNESCAPED_UNICODE
    echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);
    exit ;
?>