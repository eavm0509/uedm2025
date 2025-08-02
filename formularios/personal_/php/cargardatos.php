<?php
include '../../../login/verificar_sesion3n_mixto.php';
header('Content-Type: application/json'); // MUY IMPORTANTE
require_once('modelo.php');
$datos = array("v_cedula" => "");
if (isset($_POST['codigo']) && $_POST['codigo'] !== '') { 
    $obj= new clase_personal();
    $row= $obj -> _consultarcodigo($_POST['codigo']); 
    $fila = $row ? $row->fetch() : false;
    if ($fila) {
    $datos=json_encode(array("v_apenom"=>$fila['PER_APENOM'], 
                 "v_cedula"=>$fila['PER_CEDULA']
                ));
    } else {
       $datos = array("v_cedula" => "");
    }
}
echo json_encode($datos);

?>