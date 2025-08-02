<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("../../../conexion/conexion.php");
class clase_fcursos
{   private $db;
    public $vl_id;
    public $vl_fcu_cur;
    public $vl_fcu_cic;
    public $vl_fcur_sec;
    public $vl_fcu_esp;
    public $vl_fcu_par;
    public $vl_fcu_tipcon;
    public $vl_fcu_jurban;
    public $vl_fcu_valmat;
    public $vl_fcu_valder;
    public $vl_fcu_numcuo;
    public $vl_fcu_codper;
    public $vl_fcu_orden;
    public $vl_fcu_descri;
    public $vl_fcu_observ;
    
    public function __construct()
    {   
        $this->vl_id=0;
        $this->vl_fcu_cur=0;
        $this->vl_fcu_cic=0;
        $this->vl_fcur_sec=0;
        $this->vl_fcu_esp=0;
        $this->vl_fcu_par=0;
        $this->vl_fcu_tipcon=0;
        $this->vl_fcu_jurban=0;
        $this->vl_fcu_valmat=0;
        $this->vl_fcu_valder=0;
        $this->vl_fcu_numcuo=0;
        $this->vl_fcu_codper=0;
        $this->vl_fcu_orden=0;
        $this->vl_fcu_descri="";
        $this->vl_fcu_observ="";
        

        $this->db = (new Conexion())->getConexion();
    }
    public function _insertar($vl_fcu_cur, $vl_fcu_cic, $vl_fcur_sec, $vl_fcu_esp, $vl_fcu_par, $vl_fcu_codper, 
    $vl_fcu_orden, $vl_fcu_descri, $vl_fcu_jurban, $vl_fcu_tipcon, $vl_fcu_valmat, $vl_fcu_valder, $vl_fcu_numcuo)
    {
        $dmlsentencia="insert into snp_fcur(FCU_CUR,FCU_CIC, FCUR_SEC, FCU_ESP, FCU_PAR, FCU_CODPER, 
                       FCU_ORDEN, FCU_DESCRI, FCU_JURBAN, FCU_TIPCON, FCU_VALMAT, FCU_VALDER,
                       FCU_NUMCUO) 
        values(" . $vl_fcu_cur . "," . $vl_fcu_cic . ",". $vl_fcur_sec . ","
                  . $vl_fcu_esp . "," . $vl_fcu_par . ",". $vl_fcu_codper . ","
                  . $vl_fcu_orden . ",'" . $vl_fcu_descri . "',". $vl_fcu_jurban . ","
                  . $vl_fcu_tipcon . "," . $vl_fcu_valmat . ",". $vl_fcu_valder . ","
                  . $vl_fcu_numcuo . ")";
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    public function _consultartodo($valor){
        if($valor=='')
        {
            $dmlsentencia="SELECT * FROM snp_fcur";
        }
        else
        {
            $dmlsentencia="SELECT * FROM  snp_fcur WHERE CUR_DESCRI LIKE '%".$valor."%'";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultartodovista($valor){
        if($valor=='')
        {
            $dmlsentencia="SELECT * FROM vis_fcursos";
        }
        else
        {
            $dmlsentencia="SELECT * FROM  vis_fcursos WHERE descripcion LIKE '%".$valor."%' OR profesor LIKE '%" . $valor . "%'";
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }

    public function _consultarcodigo($valor){
        
        $dmlsentencia="SELECT * FROM snp_fcur WHERE FCU_COD = " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    public function _consultarcodigovista($valor){
        
        $dmlsentencia="SELECT * FROM vis_fcursos WHERE id = " .$valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
    public function _eliminar($valor) {
        $dmlsentencia="DELETE FROM snp_fcur WHERE FCU_COD=" . $valor;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }


    public function _actualizar($vl_fcu_cur, $vl_fcu_cic, $vl_fcur_sec, $vl_fcu_esp, $vl_fcu_par, $vl_fcu_codper, 
    $vl_fcu_orden, $vl_fcu_descri, $vl_fcu_jurban, $vl_fcu_tipcon, $vl_fcu_valmat, $vl_fcu_valder, $vl_fcu_numcuo, $id)
    { 
     $dmlsentencia="update snp_fcur SET FCU_CUR = " . $vl_fcu_cur . ",
                                        FCU_CIC = " . $vl_fcu_cic . ",
                                        FCUR_SEC = " . $vl_fcur_sec . ",
                                        FCU_ESP = " . $vl_fcu_esp . ",
                                        FCU_PAR = " . $vl_fcu_par . ",
                                        FCU_CODPER = " . $vl_fcu_codper . ",
                                        FCU_ORDEN = " . $vl_fcu_orden . ",
                                        FCU_DESCRI = '" . $vl_fcu_descri . "',
                                        FCU_JURBAN = '" . $vl_fcu_jurban . "',
                                        FCU_TIPCON = " . $vl_fcu_tipcon . ",
                                        FCU_VALMAT = " . $vl_fcu_valmat . ",
                                        FCU_VALDER = " . $vl_fcu_valder . ",
                                        FCU_NUMCUO = " . $vl_fcu_numcuo . "                         
                                        WHERE FCU_COD=".$id;
     
     
     $registros = $this->db->query($dmlsentencia);
     return $registros;
 }

}