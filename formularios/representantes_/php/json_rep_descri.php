<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('modelo.php');
$obj= new clase_representantes();
$result=$obj->_consultartodo('');

$datos = $result->fetchAll();
$arrayDatos = [];
// Barrido sobre los resultados de fetchAll()
foreach ($datos as $row) {
    $arrayDatos[] = [
        "codigook" => $row["REP_CODIGO"],
        "cedulaok" => $row["REP_CEDULA"],
        "descriok" => $row["REP_APENOM"]
    ];
} 
header('Content-Type: application/json');
    // Salida en formato JSON , JSON_UNESCAPED_UNICODE
    echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);
?>