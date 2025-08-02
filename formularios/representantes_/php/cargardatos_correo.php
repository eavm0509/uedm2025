<?php
include '../../../login/verificar_sesion3n_mixto.php';
header('Content-Type: application/json'); // MUY IMPORTANTE 
require_once('modelo.php');
//if (isset($_POST['correo']) && $_POST['correo'] !== '') {
        $obj = new clase_representantes();
        $row = $obj->_consultarcorreo($_POST['correo'],$_POST['codigo']);
        $fila=$row->fetch();
        $datos=json_encode(array("v_contador" => $fila['_contador'] ));
//}
echo $datos;

?>