<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('modelo.php');
$obj= new clase_ciclos();
$row= $obj -> _consultarcodigo($_POST['codigo']); 
$fila=$row->fetch();
$datos=json_encode(array("v_nombre"=>$fila['CIC_NOMB'], "v_observ"=>$fila['CIC_OBSERV']));
echo $datos;
?>