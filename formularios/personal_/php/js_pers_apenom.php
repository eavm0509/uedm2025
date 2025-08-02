<?php
include '../../../login/verificar_sesion3n_mixto.php';
// header('Access-Control-Allow-Origin: *'); // solo si usas peticiones desde otro dominio
//session_start();
//if (!isset($_SESSION['usuario'])) {
    header('Content-Type: application/json');
  //  echo json_encode(['error' => 'Sesión expirada']);
  //  exit;
//}

require_once('modelo.php');
$obj = new clase_personal();
$result = $obj->_consultartodo('');

$datos = $result->fetchAll(); // Suponiendo que $result es un PDOStatement
$arrayDatos = [];

foreach ($datos as $row) {
    $arrayDatos[] = [
        "codigook" => $row["PER_CODIGO"],
        "descriok" => $row["PER_APENOM"],
        "correook" => $row["PER_CORREO"],
        "cedulaok" => $row["PER_CEDULA"]
    ];
}

echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);
?>