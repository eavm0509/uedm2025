<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('modelo.php');
$obj= new clase_paralelos();
$row= $obj -> _consultarcodigo($_POST['codigo']); 
$fila=$row->fetch();
$datos=json_encode(array("v_nombre"=>$fila['PAR_NOMBRE'], "v_observ"=>$fila['PAR_OBSERV']));
echo $datos;
?>
