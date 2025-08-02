<?php
include '../../../login/verificar_sesion3n_mixto.php';
// Encabezado para permitir solicitudes desde el navegador (CORS)
//header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('modelo.php');
$obj= new clase_materias();
$result=$obj->_consultarcodigo_person_vista($_GET['codper']);

$datos = $result->fetchAll();
$arrayDatos = [];
// Barrido sobre los resultados de fetchAll()
foreach ($datos as $row) {
    $arrayDatos[] = [
        "codmatok" => $row["MAT_CODIGO"],
        "descriok" => $row["FCU_DESCRI"],
        "asignaok" => $row["ASIG_NOMBRE"],
    ];
} 
    // Salida en formato JSON , JSON_UNESCAPED_UNICODE
    echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);

?>
