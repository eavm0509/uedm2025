<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('modelo.php');
$obj= new clase_especialidades();
$row= $obj -> _consultarcodigo($_POST['codigo']); 
$fila=$row->fetch();
$datos=json_encode(array("v_nombre"=>$fila['ESP_NOMBRE'], "v_titulo"=>$fila['ESP_TITULO'], "v_observ"=>$fila['ESP_OBSERV'] ));
//$datos=json_encode($row);
//var_dump($datos);
echo $datos;
?>