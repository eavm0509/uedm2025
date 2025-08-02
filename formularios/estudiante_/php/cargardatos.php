<?php
include '../../../login/verificar_sesion3n_mixto.php';
header('Content-Type: application/json');
require_once('modelo.php');

$datos = array("v_cedula" => "");

if (isset($_POST['codigo']) && $_POST['codigo'] !== '') { 
    $obj = new clase_estudiantes();
    $row = $obj->_consultarcodigo($_POST['codigo']); 
    $fila = $row ? $row->fetch(PDO::FETCH_ASSOC) : false;

    if ($fila) {
        $datos = [
            // Datos básicos
            "v_nombre"     => $fila['ALU_NOMBRE'],
            "v_apellido"   => $fila['ALU_APELLI'],
            "v_cedula"     => $fila['ALU_CEDULA'],
            "v_fnacer"     => $fila['ALU_FNACER'],
            "v_lnacer"     => $fila['ALU_LNACER'],
            "v_estciv"     => $fila['ALU_ESTCIV'],
            "v_diredo"     => $fila['ALU_DIREDO'],
            "v_teledo"     => $fila['ALU_TELEDO'],
            "v_telest"     => $fila['ALU_TELEST'],
            "v_emaest"     => $fila['ALU_EMAEST'],
            "v_sexo"       => $fila['ALU_SEXO'],
            "v_tipo"       => $fila['ALU_TIPO'],
            "v_ordina"     => $fila['ALU_ORDINA'],
            "v_nuevo"      => $fila['ALU_NUEVO'],
            "v_repite"     => $fila['ALU_REPITE'],
            "v_retirado"   => $fila['ALU_RETIRADO'],
            "v_fecret"     => $fila['ALU_FECRET'],
            "v_discap"     => $fila['ALU_DISCAP'],
            "v_ncadis"     => $fila['ALU_NCADIS'],
            "v_enferm"     => $fila['ALU_ENFERM'],
            "v_defetn"     => $fila['ALU_DEFETN'],
            "v_colevi"     => $fila['ALU_COLEVI'],
            "v_dicovi"     => $fila['ALU_DICOVI'],
            "v_anoant"     => $fila['ALU_ANOANT'],
            "v_curant"     => $fila['ALU_CURANT'],
            "v_notdis"     => $fila['ALU_NOTDIS'],
            "v_notapr"     => $fila['ALU_NOTAPR'],
            
            // Datos académicos
            "v_fecing"     => $fila['ALU_FECING'],
            "v_fmatri"     => $fila['ALU_FMATRI'],
            "v_matric"     => $fila['ALU_MATRIC'],
            "v_nfolio"     => $fila['LU_NFOLIO'],
            "v_curso"      => $fila['ALU_CODCUR'],

            // Madre
            "v_cedmdr"     => $fila['ALU_CEDMDR'],
            "v_nacmdr"     => $fila['ALU_NACMDR'],
            "v_nommdr"     => $fila['ALU_NOMMDR'],
            "v_fnmdr"      => $fila['ALU_FNMDR'],
            "v_ecimdr"     => $fila['ALU_ECIMDR'],
            "v_dirmdr"     => $fila['ALU_DIRMDR'],
            "v_parmdr"     => $fila['ALU_PARMDR'],
            "v_prvmdr"     => $fila['ALU_PRVMDR'],
            "v_canmdr"     => $fila['ALU_CANMDR'],
            "v_ca1mdr"     => $fila['ALU_CA1MDR'],
            "v_ca2mdr"     => $fila['ALU_CA2MDR'],
            "v_ncamdr"     => $fila['ALU_NCAMDR'],
            "v_barmdr"     => $fila['ALU_BARMDR'],
            "v_telmdr"     => $fila['ALU_TELMDR'],
            "v_emamdr"     => $fila['ALU_EMAMDR'],
            "v_promdr"     => $fila['ALU_PROMDR'],
            "v_nedmdr"     => $fila['ALU_NEDMDR'],
            "v_tramdr"     => $fila['ALU_TRAMDR'],
            "v_lutmdr"     => $fila['ALU_LUTMDR'],

            // Padre
            "v_cedpdr"     => $fila['ALU_CEDPDR'],
            "v_nacpdr"     => $fila['ALU_NACPDR'],
            "v_nompdr"     => $fila['ALU_NOMPDR'],
            "v_fnpdr"      => $fila['ALU_FNPDR'],
            "v_ecipdr"     => $fila['ALU_ECIPDR'],
            "v_dirpdr"     => $fila['ALU_DIRPDR'],
            "v_parpdr"     => $fila['ALU_PARPDR'],
            "v_prvpdr"     => $fila['ALU_PRVPDR'],
            "v_canpdr"     => $fila['ALU_CANPDR'],
            "v_ca1pdr"     => $fila['ALU_CA1PDR'],
            "v_ca2pdr"     => $fila['ALU_CA2PDR'],
            "v_ncapdr"     => $fila['ALU_NCAPDR'],
            "v_barpdr"     => $fila['ALU_BARPDR'],
            "v_telpdr"     => $fila['ALU_TELPDR'],
            "v_emapdr"     => $fila['ALU_EMAPDR'],
            "v_propdr"     => $fila['ALU_PROPDR'],
            "v_nedpdr"     => $fila['ALU_NEDPDR'],
            "v_trapdr"     => $fila['ALU_TRAPDR'],
            "v_lutpdr"     => $fila['ALU_LUTPDR'],

            // Representante
            "v_codrpr"     => $fila['ALU_CODRPR'],
            "v_relrpr"     => $fila['ALU_RELRPR'],

            // Otros
            "v_observ"     => $fila['ALU_OBSERV'],
        ];
    } else {
        $datos = ["v_cedula" => ""];
    }
}

echo json_encode($datos);
?>
