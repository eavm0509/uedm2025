<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('modelo.php');
$obj= new clase_seccion();
$row= $obj -> _consultarcodigo($_POST['codigo']); 
$fila=$row->fetch();
$datos=json_encode(array("v_nombre"=>$fila['SEC_NOMBRE'], "v_observ"=>$fila['SEC_OBSERV']));
//$datos=json_encode($row);
//var_dump($datos);
echo $datos;
?>