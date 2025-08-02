<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('modelo.php');
$obj = new clase_institucion();
$row = $obj->_consultartodo(); 
$fila = $row->fetch();

$datos = json_encode(array(
    "v_titul1" => $fila['CON_TITUL1'],
    "v_titul2" => $fila['CON_TITUL2'],
    "v_titul3" => $fila['CON_TITUL3'],
    "v_titul4" => $fila['CON_TITUL4'],
    "v_titul5" => $fila['CON_TITUL5'],
    "v_ruc" => $fila['CON_RUC'],
    "v_desano" => $fila['CON_DESANO'],
    "v_ordina" => $fila['CON_ORDINA'],
    "v_fecini" => $fila['CON_FECINI'],
    "v_provin" => $fila['CON_PROVIN'],
    "v_fecgra" => $fila['CON_FECGRA'],
    "v_sigrec" => $fila['CON_SIGREC'],
    "v_rector" => $fila['CON_RECTOR'],
    "v_sigvr" => $fila['CON_SIGVR'],
    "v_vicere" => $fila['CON_VICERE'],
    "v_sigpv" => $fila['CON_SIGPV'],
    "v_privoc" => $fila['CON_PRIVOC'],
    "v_sigsv" => $fila['CON_SIGSV'],
    "v_segvoc" => $fila['CON_SEGVOC'],
    "v_sigtv" => $fila['CON_SIGTV'],
    "v_tervoc" => $fila['CON_TERVOC'],
    "v_sigsec" => $fila['CON_SIGSEC'],
    "v_secret" => $fila['CON_SECRET'],
    "v_sigins" => $fila['CON_SIGINS'],
    "v_inspec" => $fila['CON_INSPEC'],
    "v_sigcol" => $fila['CON_SIGCOL'],
    "v_colec" => $fila['CON_COLEC']
));

echo $datos;
?>
