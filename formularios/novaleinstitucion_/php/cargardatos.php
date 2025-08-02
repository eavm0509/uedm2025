<?php
require_once('modelo.php');
$obj= new clase_institucion();
$row= $obj -> _consultartodo(); 
$fila=$row->fetch();
$datos=json_encode(array("v_titul1"=>$fila['CON_TITUL1'], 
                         "v_titul2"=>$fila['CON_TITUL2'], 
                         "v_titul3"=>$fila['CON_TITUL3']));
echo $datos;
?>