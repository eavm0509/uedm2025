<?php
include '../../../login/verificar_sesion3n_mixto.php'; 
header('Content-Type: application/json'); // MUY IMPORTANTE $_POST['codigo']
require_once('modelo.php');
$datos = array("v_cedula" => "");
if (isset($_POST['codigo']) && $_POST['codigo'] !== '') {
        $obj = new clase_representantes();
        $row = $obj->_consultarcodigo($_POST['codigo']);
        $fila = $row ? $row->fetch() : false;
        if ($fila) {
                $datos = array(
                "v_codigo" => $fila['REP_CODIGO'],
                "v_cedula" => $fila['REP_CEDULA'],
                "v_apenom" => $fila['REP_APENOM'],
                "v_fecnac" => $fila['REP_FECNAC'],
                "v_sexo"   => $fila['REP_SEXO'],
                "v_estciv" => $fila['REP_ESTCIV'],
                "v_domici" => $fila['REP_DOMICI'],
                "v_teldom" => $fila['REP_TELDOM'],
                "v_trabaj" => $fila['REP_TRABAJ'],
                "v_dirtra" => $fila['REP_DIRTRA'],
                "v_teltra" => $fila['REP_TELTRA'],
                "v_profes" => $fila['REP_PROFES'],
                "v_fecing" => $fila['REP_FECING'],
                "v_nacion" => $fila['REP_NACION'],
                "v_correo" => $fila['REP_CORREO'],
                "v_movilw" => $fila['REP_MOVILW'],
                "v_contac" => $fila['REP_CONTAC'],
                "v_telcon" => $fila['REP_TELCON'],
                "v_observ" => $fila['REP_OBSERV']
        );
        } else {
        $datos = array("v_cedula" => "");
        }
}
echo json_encode($datos);
?>