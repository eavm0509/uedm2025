<?php
require_once('modelo.php');
include '../../../login/verificar_sesion3n_mixto.php';
$obj= new clase_materias();
$row= $obj -> _consultarcodigo_materi_vista($_POST['codigo']); 
$fila=$row->fetch();
$datos=json_encode(array("v_fcurso"=>$fila['FCU_DESCRI'], "v_asignatura"=>$fila['ASIG_NOMBRE'], "v_docente"=>$fila['PER_APENOM'] ));
echo $datos;
?>